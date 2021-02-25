<?php
class AdminModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectStockM()
    {
        $sql = "SELECT nombre, cantidad FROM productos WHERE cantidad <= 10 ORDER BY cantidad ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectProductos()
    {
        $sql = "SELECT producto, cantidad, SUM(cantidad) as total FROM detalle_venta group by id_producto ORDER BY cantidad DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }
    public function productos()
    {
        $sql = "SELECT COUNT(*) FROM productos WHERE estado = 1";
        $res = $this->selecT($sql);
        return $res;
    }
    public function clientes()
    {
        $sql = "SELECT COUNT(*) FROM clientes WHERE estado = 1";
        $res = $this->selecT($sql);
        return $res;
    }
    public function usuarios()
    {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE estado = 1";
        $res = $this->selecT($sql);
        return $res;
    }
    public function ventas()
    {
        $sql = "SELECT COUNT(*) FROM ventas WHERE fecha > CURDATE();";
        $res = $this->selecT($sql);
        return $res;
    }
   
}
