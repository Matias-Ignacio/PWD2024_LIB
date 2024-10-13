<?php 
class Comercio {
    private $id;
    private $nombre;
    private $objCiudad;
    private $latitud;
    private $longitud;
    private $mensajeoperacion;


    public function __construct(){
        $this->id = "";
        $this->nombre = "";
        $this->objCiudad = new Ciudad();
        $this->latitud = "";
        $this->longitud = "";
        $this->mensajeoperacion = "";
    }

    public function setear($id, $nombre, $objCiudad, $latitud, $longitud)    {
        $this->setid($id);
        $this->setnombre($nombre);
        $this->setobjCiudad($objCiudad);
        $this->setLatitud($latitud);
        $this->setLongitud($longitud);
    }

    public function getid(){
        return $this->id;
    }
    public function setid($valor){
        $this->id = $valor;
    }
    
    public function getnombre(){
        return $this->nombre;  
    }

    public function setNombre($valor){
        $this->nombre = $valor; 
    }

    public function getobjCiudad(){
        return $this->objCiudad;  
    }

    public function setobjCiudad($obj){
        $this->objCiudad = $obj; 
    }

    public function getLatitud(){
        return $this->latitud;  
    }

    public function setLatitud($valor){
        $this->latitud = $valor; 
    }

    public function getLongitud(){
        return $this->longitud;  
    }

    public function setLongitud($valor){
        $this->longitud = $valor; 
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }

    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor; 
    }


    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $objCiudad = new Ciudad();     
        $sql = "SELECT * FROM comercio WHERE com_id = '".$this->getid()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    $row = $base->Registro();
                    $objCiudad->setid( $row['ciu_id']);
                    $objCiudad->buscar($row['ciu_id']);
                    $this->setear($row['com_id'], $row['com_nombre'], $objCiudad, $row['latitud'],$row['longitud']); 
                }
            }
        }else{
            $this->setmensajeoperacion("Comercio->listar: ".$base->getError());
        }
        return $resp;
    }


    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO comercio (com_id, com_nombre, ciu_id)  VALUES ('"
        .$this->getid()."', '"
        .$this->getNombre()."', '"
        .$this->getobjCiudad()->getid()."','"
        .$this->getLatitud()."','"
        .$this->getLongitud()."');";
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Comercio->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->insertar: ".$base->getError());
        }
        return $resp;
    }


    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE comercio SET 
        com_nombre = '".$this->getNombre()."', 
        ciu_id = '".$this->getobjCiudad()->getid()."',
        latitud = '".$this->getLatitud()."',
        Longitud = '".$this->getLongitud()."' WHERE com_id = '".$this->getid()."'";
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Comercio->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->modificar: ".$base->getError());
        }
        return $resp;
    }


    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM comercio WHERE com_id = '".$this->getid()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            }else{
                $this->setmensajeoperacion("Comercio->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->eliminar: ".$base->getError());
        }
        return $resp;
    }


    public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM comercio ";
        if ($parametro != "") {
            $sql .= " WHERE " .$parametro;
        }
        
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                while ($row = $base->Registro()){
                    $obj = new Comercio();
                    $objCiudad = new Ciudad();
                    $objCiudad->setid( $row['ciu_id']);
                    $objCiudad->buscar($row['ciu_id']);
                    $obj->setear($row['com_id'], $row['com_nombre'], $objCiudad, $row['latitud'], $row['longitud']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            self::setmensajeoperacion("Comercio->listar: ".$base->getError());
        }
        return $arreglo;
    }

}
?>