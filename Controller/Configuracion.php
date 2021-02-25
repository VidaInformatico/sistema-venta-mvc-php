<?php
    class Configuracion extends Controllers{
        public function __construct()
        {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
            parent::__construct();

        }
        public function Listar()
        {
            $data = $this->model->selectConfiguracion();         
            $this->views->getView($this, "Listar", $data, "");
        }
    public function actualizar()
    {
        $id = $_POST['id'];
        $ruc = $_POST['ruc'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $razon = $_POST['razon'];
        $actualizar = $this->model->actualizarConfiguracion($ruc, $nombre, $telefono, $direccion, $razon ,$id);
        if ($actualizar == 1) {
            $alert = array('mensaje' => 'modificado');
        }else {
            $alert = array('mensaje' => 'error');
        }
        $data = $this->model->selectConfiguracion();
        $this->views->getView($this, "Listar", $data, $alert);
        die();
    }
}
