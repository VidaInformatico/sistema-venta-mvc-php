<?php
class Mysql extends Conexion{
    private $conexion;
    private $strquery;
    private $arrvalues;
    private $id;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }
    public function insert(string $query, array $arrvalues)
    {
        $this->strquery = $query;
        $this->arrvalues = $arrvalues;
        $insert = $this->conexion->prepare($this->strquery);
        $res = $insert->execute($this->arrvalues);
        if ($res) {
            $lastInsert = $this->conexion->lastInsertId();
        }else{
            $lastInsert = 0;
        }
        return $lastInsert;
    }
    public function select(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function select_all(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }
    public function update(string $query, array $arrvalues){
        $this->strquery = $query;
        $this->arrvalues = $arrvalues;
        $update = $this->conexion->prepare($this->strquery);
        $res = $update->execute($this->arrvalues);
        return $res;
    }
    public function delete(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        return $result;
    }
}
?>