<?php
class Usuarios extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }
    public function Listar()
    {
        $data = $this->model->selectUsuarios();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];
        $confirmar = $_POST['confirmar'];
        $hash = hash("SHA256", $clave);
        if ($clave != $confirmar) {
            $alert = array('mensaje' => 'no');
        } else {
            $insert = $this->model->insertarUsuarios($nombre, $usuario, $correo, $hash, $rol);
            if ($insert > 0) {
                $alert = 'registrado';
            } else if ($insert == 'existe') {
                $alert = 'existe';
            } else {
                $alert = 'error';
            }
        }

        $data = $this->model->selectUsuarios();
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarUsuarios($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $correo, $rol, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert =  'error';
        }
        $data = $this->model->selectUsuarios();
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarUsuarios($id);
        $data = $this->model->selectUsuarios();
        header("location: " . base_url() . "Usuarios/Listar");
        die();
    }
    public function eliminados()
    {
        $data = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
        
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarUsuarios($id);
        $this->model->selectUsuarios();
        header('location: ' . base_url() . 'Usuarios/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
    public function login()
    {
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->selectUsuario($usuario, $hash);
            if (!empty($data)) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['activo'] = true;
                    header('location: '.base_url(). 'Admin/Listar');
            } else {
                $error = 0;
                header("location: ".base_url()."?msg=$error");
            }
        }
    }
    public function cambiar()
    {
        $actual = $_POST['claves'];
        $hash = hash("SHA256", $actual['actual']);
        $nueva = hash("SHA256", $actual['nueva']);
        $data = $this->model->cambiarPass($hash);
        if ($data != null) {
            echo 1;
            $this->model->cambiarContra($nueva, $data['id']);
        }  
    }
    public function salir()
    {
        session_destroy();
        header("Location: ".base_url());
    }
}
