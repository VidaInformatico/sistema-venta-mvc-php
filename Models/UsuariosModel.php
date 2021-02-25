<?php
class UsuariosModel extends Mysql{
    public $id, $clave, $nombre, $usuario, $correo, $rol;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectInactivos()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarUsuarios(string $nombre, string $usuario, string $correo, string $clave, string $rol)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = $rol;
        $sql = "SELECT * FROM usuarios WHERE usuario = '{$this->usuario}' OR correo = '{$this->correo}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO usuarios(nombre, usuario, correo, clave, rol) VALUES (?,?,?,?,?)";
            $data = array($this->nombre, $this->usuario, $this->correo, $this->clave, $this->rol);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarUsuarios(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarUsuarios(string $nombre, string $usuario, string $correo, string $rol, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->rol = $rol;
        $this->id = $id;
        $query = "UPDATE usuarios SET nombre=?, usuario=?, correo=?, rol=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->correo,$this->rol, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE usuarios SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE usuario = '{$this->usuario}' AND clave = '{$this->clave}'";
        $res = $this->select($sql);
        return $res;
    }
    public function reingresarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE usuarios SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function cambiarPass(string $clave)
    {
        $this->clave = $clave;
        $query = "SELECT * FROM usuarios WHERE clave = '$clave'";
        $resul = $this->select($query);
        return $resul;
    }
    public function cambiarContra(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "UPDATE usuarios SET clave = ? WHERE id = ?";
        $data = array($this->clave, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
    
}
?>