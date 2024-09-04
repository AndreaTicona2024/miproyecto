<?php
namespace App\Controllers;
<<<<<<< HEAD

use CodeIgniter\Controller;
use App\Models\ProductoModel; // Importar el modelo ProductoModel

class Productos extends Controller
=======
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Login extends Controller
>>>>>>> df995b144dcec79aa9274b344d523ee119dfc1c3
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }
<<<<<<< HEAD

    public function crear()
    {
        return view('create_producto');
=======
    public function crear()
    {
        echo view('create_producto');
>>>>>>> df995b144dcec79aa9274b344d523ee119dfc1c3
    }

    public function guardar()
    {
        $productoModel = new ProductoModel();

        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required',
            'precioBase' => 'required|decimal',
            'stock' => 'required|integer',
            'fechaRegistro' => 'required|valid_date',
            'estado' => 'required|in_list[activo,inactivo]',
            'imgUrl' => 'uploaded[imgUrl]|max_size[imgUrl,2048]|is_image[imgUrl]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Manejar la carga de la imagen
        $imgUrl = $this->request->getFile('imgUrl');
        $imgUrlName = $imgUrl ? $imgUrl->getRandomName() : null;
        if ($imgUrl && $imgUrl->isValid()) {
            $imgUrl->move(ROOTPATH . 'public/uploads/', $imgUrlName);
        }

        // Preparar los datos del producto
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

        // Insertar los datos en la base de datos
        if ($productoModel->insert($data)) {
            $this->session->setFlashdata('success', 'Producto guardado con éxito.');
            return redirect()->to('/productos');
        } else {
            $this->session->setFlashdata('error', 'Error al guardar el producto.');
            return redirect()->back()->withInput();
        }
    }
}
<<<<<<< HEAD


=======
>>>>>>> df995b144dcec79aa9274b344d523ee119dfc1c3
