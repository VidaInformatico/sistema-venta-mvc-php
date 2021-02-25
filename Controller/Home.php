<?php
    class Home extends Controllers{
        public function __construct()
        {
        session_start();
        if (!empty($_SESSION['activo'])) {
            header("location: " . base_url()."Admin/Listar");
        }
            parent::__construct();
        }
        public function home()
        {
            $this->views->getView($this, "home");
        }
    public function login()
    {
       if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $data = $this->model->selectUsuario($usuario, $clave);
            if (!empty($data)) {
                if (password_verify($clave, $data['clave'])) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['activo'] = true;
                    header("location: Productos/Listar");
                } else {
                    $data['error'] = "Las Contraseñas no coinciden";
                    print_r($data);
                    //$this->views->getView($this, "home", $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                print_r($data);
                //$this->views->getView($this, "home");
            }
       }
    }
}
?>