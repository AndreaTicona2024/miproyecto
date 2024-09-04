<?php

<<<<<<< HEAD
namespace App\Models;

use CodeIgniter\Model;

class Productos extends Model
=======
namespace App\Controllers;

use App\Models\ProductoModel;

class ProductosController extends BaseController
>>>>>>> df995b144dcec79aa9274b344d523ee119dfc1c3
{
    public function crear()
    {
        return view('create_producto');
    }

    public function guardar()
    {
        $productoModel = new ProductoModel();

        // Reglas de validación
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required',
            'precioBase' => 'required|decimal',
            'stock' => 'required|integer',
            'fechaRegistro' => 'required|valid_date',
            'estado' => 'required|in_list[activo,inactivo]',
            'imgUrl' => 'uploaded[imgUrl]|max_size[imgUrl,2048]|is_image[imgUrl]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $imgUrl = $this->request->getFile('imgUrl');
        $imgUrlName = $imgUrl->getRandomName();

        if ($imgUrl->isValid() && !$imgUrl->hasMoved()) {
            $imgUrl->move(ROOTPATH . 'public/uploads', $imgUrlName);
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precioBase' => $this->request->getPost('precioBase'),
            'stock' => $this->request->getPost('stock'),
            'fechaRegistro' => $this->request->getPost('fechaRegistro'),
            'fechaActualizacion' => $this->request->getPost('fechaActualizacion'),
            'estado' => $this->request->getPost('estado'),
            'imgUrl' => $imgUrlName
        ];

        $productoModel->save($data);

        return redirect()->to(site_url('productos'));
    }
}
