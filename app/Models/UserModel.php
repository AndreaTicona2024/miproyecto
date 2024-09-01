<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario'; // Nombre de la tabla
    protected $primaryKey = 'idusuario';

    protected $allowedFields = ['nombreUsuario', 'nombre', 'apellido', 'email', 'contrasenia', 'telefono', 'direccion','estado', 'fechaRegistro', 'token_verificacion', 'email_verificado', 'token_expiry'];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
                return $data;
    }
    
    protected function beforeUpdate(array $data)
    {
        return $data;
    }

    public function existeUsuario($nombreUsuario)
    {
        return $this->where('nombreUsuario', $nombreUsuario)->first() !== null;
    }

    public function existeCorreo($email)
    {
        return $this->where('email', $email)->first() !== null;
    }

    public function registrarUsuario($data)
    {
        return $this->save($data);
    }

    // Nuevo método para obtener usuario por token
    public function obtenerPorToken($token)
    {
        return $this->where('token_verificacion', $token)
                    ->where('token_expiry >', date('Y-m-d H:i:s'))
                    ->first();
    }

    // Nuevo método para actualizar usuario
    public function actualizarUsuario($idusuario, $data)
    {
        return $this->update($idusuario, $data);
    }
    public function listausuarios()
    {
        return $this->where('estado', '1')->findAll(); // Obtiene todos los usuarios activos
    }
    public function actualizarInformacion($idusuario, $data)
    {
        if (!empty($data['contrasenia'])) {
            $data['contrasenia'] = password_hash($data['contrasenia'], PASSWORD_DEFAULT);
        } else {
            unset($data['contrasenia']);
        }

        // Imprimir datos para depuración
        log_message('debug', 'Datos para actualizar en el modelo: ' . print_r($data, true));

        return $this->update($idusuario, $data);
    }
    

}
