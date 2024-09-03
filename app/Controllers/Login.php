<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Login extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        $data = [];
        if ($this->session->getFlashdata('success')) {
            $data['success'] = $this->session->getFlashdata('success');
        } elseif ($this->session->getFlashdata('error')) {
            $data['error'] = $this->session->getFlashdata('error');
        }

        echo view('inc/Login', $data);
    }

    public function create()
    {
        echo view('inc/createAcount');
    }

    public function producto()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/Login/index');
        }
        echo view('inc/vistaslte/head');
        echo view('inc/vistaslte/menu');
        echo view('inc/vistaslte/aside');
        echo view('inc/productos');
        echo view('inc/vistaslte/footer');
    }

    public function validarUsuario() {
        $model = new UserModel();      
        $nombreUsuario = strtolower($this->request->getPost('nombreUsuario'));
        $contrasenia = $this->request->getPost('contrasenia');
    
        if (empty($nombreUsuario) || empty($contrasenia)) {
            $this->session->setFlashdata('error', 'Usuario y contraseña son obligatorios');
            return redirect()->to('/Login/index');
        }
    
        $usuario = $model->where('nombreUsuario', $nombreUsuario)->first();
    
        if ($usuario) {
            if ($usuario['estado'] == 0) {
                $this->session->setFlashdata('error', 'Este usuario no existe');
                return redirect()->to('/Login/index');
            }
    
            if (password_verify($contrasenia, $usuario['contrasenia'])) {
                $this->session->set('isLoggedIn', true);
                $this->session->set('idusuario', $usuario['idusuario']); 
                $this->session->set('user', $usuario);
                
                $rol = $usuario['rol'];
                $mensajeBienvenida = '';
    
                switch ($rol) {
                    case 'administrador':
                        $mensajeBienvenida = 'Bienvenido administrador';
                        break;
                    case 'cliente':
                        $mensajeBienvenida = 'Bienvenido cliente';
                        break;
                    case 'vendedor':
                        $mensajeBienvenida = 'Bienvenido vendedor';
                        break;
                    default:
                        $mensajeBienvenida = 'Bienvenido';
                        break;
                }
    
                $this->session->set('welcomeMessage', $mensajeBienvenida);
    
                return redirect()->to('/Login/producto'); 
            } else {
                $this->session->setFlashdata('error', 'Contraseña incorrecta');
            }
        } else {
            $this->session->setFlashdata('error', 'El nombre de usuario no existe');
        }
    
        return redirect()->to('/Login/index');
    }

    public function registrarUsuario()
    {
        $model = new UserModel();
    
        $nombreUsuario = strtolower($this->request->getPost('nombreUsuario'));
        $contrasenia = $this->request->getPost('contrasenia');
        $email = strtolower($this->request->getPost('email'));
    
        if (empty($nombreUsuario) || empty($contrasenia) || empty($email)) {
            $this->session->setFlashdata('error', 'Todos los campos son obligatorios');
            return redirect()->to('/Login/create');
        }
        if ($model->existeUsuario($nombreUsuario)) {
            $this->session->setFlashdata('error', 'El nombre de usuario ya está registrado');
            return redirect()->to('/Login/create');
        }
        if ($model->existeCorreo($email)) {
            $this->session->setFlashdata('error', 'El correo electrónico ya está registrado');
            return redirect()->to('/Login/create');
        }
    
        $token = bin2hex(random_bytes(16));
        $tokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // El token expira en 1 hora
    
        $data = [
            'nombreUsuario' => $nombreUsuario,
            'nombre' => strtolower($this->request->getPost('nombre')),
            'apellido' => strtolower($this->request->getPost('apellido')),
            'email' => $email,
            'contrasenia' => password_hash($contrasenia, PASSWORD_DEFAULT),
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'fechaRegistro' => date('Y-m-d H:i:s'),
            'estado' => 0, // Define el estado del usuario como 'inactivo'
            'email_verificado' => 0, // El email no está verificado aún
            'token_verificacion' => $token, // Almacenar el token de verificación
            'token_expiry' => $tokenExpiry,
        ];
    
        if ($model->insert($data)) {
            $this->enviarCorreoVerificacion($email, $token);
    
            $this->session->setFlashdata('success', 'Por favor, verifica tu correo electrónico para completar el registro.');
            return redirect()->to('/Login/listadeusuarios');
        } else {
            $this->session->setFlashdata('error', 'Error al registrar el usuario');
            // return redirect()->to('/Login/create');
        }
    }

    public function enviarCorreoVerificacion($email, $token)
    {
        $model = new UserModel();
        $usuario = $model->where('email', $email)->first();
        
        if ($usuario) {
            $link = site_url('Login/verificarCorreo?token=' . $token);
    
            $mail = new PHPMailer(true);
    
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP de Gmail
                $mail->SMTPAuth   = true;
                $mail->Username   = 'andreaticona48@gmail.com'; // Usuario SMTP
                $mail->Password   = 'gzue gjgi iand yyhj'; // Contraseña SMTP (asegúrate de usar una aplicación específica de contraseña si tienes 2FA habilitado)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587; // Puerto SMTP para STARTTLS
    
                $mail->setFrom('andreaticona48@gmail.com', 'Nombre de tu Aplicación');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Verificacion de tu correo electronico';
    
                $mail->Body    = 'Haz clic en el siguiente enlace para verificar tu correo: <a href="' . $link . '">Verificar correo</a><br><br>Si no ves el correo en tu bandeja de entrada, por favor revisa tu carpeta de spam.';
                $mail->AltBody = 'Haz clic en el siguiente enlace para verificar tu correo: ' . $link . "\n\nSi no ves el correo en tu bandeja de entrada, por favor revisa tu carpeta de spam.";
    
                $mail->send();
                return $this->response->setJSON(['status' => 'success', 'message' => 'El código de verificación ha sido enviado a tu correo. Revisa también la carpeta de spam si no lo ves en la bandeja de entrada.']);
            } catch (Exception $e) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo]);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Correo electrónico no encontrado.']);
        }
    }

    public function verificarCorreo()
    {
        $token = $this->request->getGet('token');
        
        if (!$token) {
            $this->session->setFlashdata('error', 'Token no proporcionado.');
            // return redirect()->to('/Login');
        }
    
        $model = new UserModel();
        $usuario = $model->obtenerPorToken($token);
        
        if ($usuario) {
            $updateData = [
                'email_verificado' => 1,
                'estado' => 1,
                'token_verificacion' => null,
                'token_expiry' => null,
            ];
    
            if ($model->actualizarUsuario($usuario['idusuario'], $updateData)) {
                $this->session->setFlashdata('success', 'Tu correo ha sido verificado exitosamente.');
            } else {
                $this->session->setFlashdata('error', 'Error al actualizar el estado del usuario.');
            }
        } else {
            $this->session->setFlashdata('error', 'El token es inválido o ha expirado.');
        }
    
    //     return redirect()->to('/Login');
    }
    public function listadeusuarios()
    {
        $model = new UserModel();
        $data['usuario'] = $model->listausuarios(); // Obtiene la lista de usuarios activos

        // Cargar vistas
        return 
        view('inc/vistaslte/head')
            . view('inc/vistaslte/menu')
          .  view('inc/vistaslte/aside')
           .  view('inc/list', $data) // Llama a la vista
            . view('inc/vistaslte/footer');
    }
    public function actualizar()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/Login/index');
        }
    
        $userModel = new UserModel();
        $idusuario = $this->session->get('idusuario');
    
        // Obtener los datos del usuario
        $data['usuario'] = $userModel->find($idusuario);
    
        echo view('inc/vistaslte/head');
        echo view('inc/vistaslte/menu');
        echo view('inc/vistaslte/aside');
        echo view('inc/personal_information', $data); // Pasar $data a la vista
        echo view('inc/vistaslte/footer');
    }

    public function actualizarInformacion()
    {
        $UserModel = new UserModel();
        $idusuario = $this->session->get('idusuario');
    
        // Obtener datos del formulario
        $nombreUsuario = strtolower($this->request->getPost('nombreUsuario'));
        $nombre = $this->request->getPost('nombre');
        $apellido = $this->request->getPost('apellido');
        $email = strtolower($this->request->getPost('email'));
        $telefono = $this->request->getPost('telefono');
        $contrasenia = $this->request->getPost('contrasenia');
    
        // Imprimir datos para depuración
        log_message('debug', 'Datos del formulario: ' . print_r([
            'nombreUsuario' => $nombreUsuario,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'contrasenia' => $contrasenia,
        ], true));
    
        // Verificar campos obligatorios
        if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono)) {
            $this->session->setFlashdata('error', 'Todos los campos obligatorios deben ser completados');
            return redirect()->back()->withInput();
        }
    
        // Verificar si el correo electrónico ya está registrado para otro usuario
        $existingUser = $UserModel->where('email', $email)->where('idusuario !=', $idusuario)->first();
        if ($existingUser) {
            $this->session->setFlashdata('error', 'El correo electrónico ya está registrado');
            return redirect()->back()->withInput();
        }
    
        // Verificar si el nombre de usuario ya está registrado para otro usuario
        $existingUserName = $UserModel->where('nombreUsuario', $nombreUsuario)->where('idusuario =', $idusuario)->first();
        if ($existingUserName) {
            $this->session->setFlashdata('error', 'El nombre de usuario ya está registrado');
            return redirect()->back()->withInput();
        }
    
        // Configurar reglas de validación
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telefono' => 'required|min_length[10]',
            'contrasenia' => 'permit_empty|min_length[6]',
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Preparar datos para la actualización
        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
        ];
    
        // Manejar contrasenia de forma segura
        if (!empty($contrasenia)) {
            $data['contrasenia'] = password_hash($contrasenia, PASSWORD_DEFAULT);
        }
    
        // Imprimir datos para depuración antes de la actualización
        log_message('debug', 'Datos para la actualización: ' . print_r($data, true));
    
        // Llamar al método del modelo para actualizar la información
        $result = $UserModel->actualizarInformacion($idusuario, $data);
    
        // Verificar el resultado de la actualización
        if ($result) {
            $this->session->setFlashdata('message', 'Información actualizada correctamente');
            return redirect()->to('/Login/listadeusuarios');
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar la información');
            return redirect()->back();
        }
    }
    
    
    public function existeUsuario($nombreUsuario)
{
    return $this->where('nombreUsuario', $nombreUsuario)->first() !== null;
}

public function existeCorreo($email)
{
    return $this->where('email', $email)->first() !== null;
    
}
}
