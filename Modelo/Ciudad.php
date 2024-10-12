<?php 
class Ciudad {
    private $id;
    private $nombre;
    private $latitud;
    private $longitud;

    private $mensajeoperacion;


    public function __construct(){
        $this->id="";
        $this->nombre = "";
        $this->latitud = "";
        $this->longitud = "";
        $this->mensajeoperacion ="";
    }


    public function setear($id, $nombre, $latitud, $longitud)    {
        $this->setid($id);
        $this->setNombre($nombre);
        $this->setlatitud($latitud);
        $this->setlongitud($longitud);
    }


    public function getid(){
        return $this->id;
    }

    public function setid($valor){
        $this->id = $valor;
    }

    public function getlatitud(){
        return $this->latitud;
    }

    public function setlatitud($valor){
        $this->latitud = $valor;
    }

    public function getlongitud(){
        return $this->longitud;
    }

    public function setlongitud($valor){
        $this->longitud = $valor;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($valor){
        $this->nombre = $valor;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }

    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

 
    public function buscar($id){
        $base = new BaseDatos();
        $exito = false;
        $sql = "Select * from ciudad where ciu_id = " . $id;
        if($base ->Iniciar()){
            if($base->Ejecutar($sql)){
                if($row = $base->Registro()){
                    $this -> setid($id);
                    $this -> setlatitud($row['ciu_latitud']);
                    $this -> setlongitud($row['ciu_longitud']);
                    $this -> setNombre($row['ciu_nombre']);
                    $exito = true;
                }
            }
        }
        return $exito;
    }
    
    public function insertar(){
        $resp = false;
        $base  =  new BaseDatos();
        $sql  =  "INSERT INTO ciudad(ciu_id, ciu_nombre, ciu_latitud, ciu_longitud)  VALUES('"
        .$this->getid()."', '"
        .$this->getNombre()."', '"
        .$this->getlatitud()."', '"
        .$this->getlongitud()."', '";
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Ciudad->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudada->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE ciudad SET 
        ciu_nombre = '".$this->getNombre()."', 
        ciu_latitud = '".$this->getlatitud()."', 
        ciu_longitud = '".$this->getlongitud()."', 
        WHERE ciu_id = ".$this->getid();
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Ciudad->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudad->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM ciudad WHERE ciu_id = '".$this->getid()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            }else{
                $this->setmensajeoperacion("Ciudad->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudad->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM ciudad ";
        if ($parametro != "") {
            $sql .= " WHERE " .$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                
                while ($row = $base->Registro()){
                    $obj = new Ciudad();
                    $obj->setear($row['ciu_id'], $row['ciu_ombre'],$row['ciu_latitud'], $row['ciu_longitud']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            self::setmensajeoperacion("Ciudad->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>