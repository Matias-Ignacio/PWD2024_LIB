<?php 
class Ciudad {
    private $id;
    private $nombre;
    private $coordenada;

    private $mensajeoperacion;


    public function __construct(){
        $this->id="";
        $this->nombre = "";
        $this->coordenada = "";
        $this->mensajeoperacion ="";
    }


    public function setear($dni, $nombre, $coordenada)    {
        $this->setid($dni);
        $this->setNombre($nombre);
        $this->setcoordenada($coordenada);
    }


    public function getid(){
        return $this->id;
    }

    public function setid($valor){
        $this->id = $valor;
    }

    public function getCoordenada(){
        return $this->coordenada;
    }

    public function setCoordenada($valor){
        $this->coordenada = $valor;
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

 
    public function buscar($dni){
        $base = new BaseDatos();
        $exito = false;
        $sql = "Select * from ciudad where id = " . $dni;
        if($base ->Iniciar()){
            if($base->Ejecutar($sql)){
                if($row = $base->Registro()){
                    $this -> setid($dni);
                    $this -> setCoordenada($row['ciu_coordenada']);
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
        $sql  =  "INSERT INTO ciudad(ciu_id, ciu_nombre, ciu_coordenada)  VALUES('"
        .$this->getid()."', '"
        .$this->getCoordenada()."', '"
        .$this->getNombre()."', '";
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
        ciu_coordenada = '".$this->getCoordenada()."', 
        ciu_nombre = '".$this->getNombre()."', 
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
                    $obj->setear($row['ciu_id'], $row['ciu_coordenada'], $row['ciu_ombre']);
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