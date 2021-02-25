<?php
class Productos extends Controllers
{
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
        $data = $this->model->selectProductos();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectProductosInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $insert = $this->model->insertarProductos($codigo, $nombre, $precio);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert = 'error';
        }
        $this->model->selectProductos();
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editarProductos($id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $actualizar = $this->model->actualizarProductos($codigo, $nombre, $cantidad, $precio, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data, $eliminar);
        die();
    }
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarProductos($id);
        $data = $this->model->selectProductos();
        header('location: ' . base_url() . 'Productos/Listar');
        //$this->views->getView($this, "Listar", $data);
        die();
    }
}
?>