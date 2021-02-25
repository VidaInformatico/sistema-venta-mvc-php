<?php
class ClientesModel extends Mysql{
    public $id, $ruc, $nombre, $telefono, $direccion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectClientes()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectClientesInactivos()
    {
        $sql = "SELECT * FROM clientes WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $ruc)
    {
        $this->ruc = $ruc;
        $sql = "SELECT * FROM clientes WHERE ruc = $this->ruc AND estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarClientes(String $ruc, string $nombre, string $telefono, string $direccion)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $sql = "SELECT * FROM clientes WHERE ruc = '{$this->ruc}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO clientes(ruc, nombre, telefono, direccion) VALUES (?,?,?,?)";
            $data = array($this->ruc, $this->nombre, $this->telefono, $this->direccion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarClientes(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM clientes WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarClientes(String $ruc, string $nombre, string $telefono, string $direccion, int $id)
    {
        $return = "";
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;
        $query = "UPDATE clientes SET ruc=?, nombre=?, telefono=?, direccion=? WHERE id=?";
        $data = array($this->ruc, $this->nombre, $this->telefono, $this->direccion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarClientes(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE clientes SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>