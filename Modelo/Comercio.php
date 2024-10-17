<?php 
class Comercio extends BaseDatos {
    private $id;
    private $nombre;
    private $objCiudad;
    private $latitud;
    private $longitud;
    private $mensajeoperacion;


    public function __construct(){
        parent::__construct();
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
        $objCiudad = new Ciudad();     
        $sql = "SELECT * FROM comercio WHERE com_id = '".$this->getid()."'";
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    $row = $this->Registro();
                    $objCiudad->setid( $row['ciu_id']);
                    $objCiudad->buscar($row['ciu_id']);
                    $this->setear($row['com_id'], $row['com_nombre'], $objCiudad, $row['latitud'],$row['longitud']); 
                }
            }
        }else{
            $this->setmensajeoperacion("Comercio->listar: ".$this->getError());
        }
        return $resp;
    }


    public function insertar(){
        $resp = false;
        $sql = "INSERT INTO comercio (com_id, com_nombre, ciu_id, latitud, longitud)  VALUES ('"
        .$this->getid()."', '"
        .$this->getNombre()."', '"
        .$this->getobjCiudad()->getid()."','"
        .$this->getLatitud()."','"
        .$this->getLongitud()."');";
        if ($this->Iniciar()) {
            if($this->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Comercio->insertar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->insertar: ".$this->getError());
        }
        return $resp;
    }


    public function modificar(){
        $resp = false;
        $sql = "UPDATE comercio SET 
        com_nombre = '".$this->getNombre()."', 
        ciu_id = '".$this->getobjCiudad()->getid()."',
        latitud = '".$this->getLatitud()."',
        Longitud = '".$this->getLongitud()."' WHERE com_id = '".$this->getid()."'";
        if ($this->Iniciar()) {
            if($this->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Comercio->modificar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->modificar: ".$this->getError());
        }
        return $resp;
    }


    public function eliminar(){
        $resp = false;
        $sql = "DELETE FROM comercio WHERE com_id = '".$this->getid()."'";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            }else{
                $this->setmensajeoperacion("Comercio->eliminar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Comercio->eliminar: ".$this->getError());
        }
        return $resp;
    }


    public function listar($parametro=""){
        $arreglo = array();
        $sql = "SELECT * FROM comercio ";
        if ($parametro != "") {
            $sql .= " WHERE " .$parametro;
        }
        
        $res = $this->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                while ($row = $this->Registro()){
                    $obj = new Comercio();
                    $objCiudad = new Ciudad();
                    $objCiudad->setid( $row['ciu_id']);
                    $objCiudad->buscar($row['ciu_id']);
                    $obj->setear($row['com_id'], $row['com_nombre'], $objCiudad, $row['latitud'], $row['longitud']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("Comercio->listar: ".$this->getError());
        }
        return $arreglo;
    }

}
?>