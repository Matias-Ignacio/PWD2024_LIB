<?php 
class Ciudad {
    private $ciu_id;
    private $ciu_nombre;

    private $mensajeoperacion;


    public function __construct(){
        $this->ciu_id="";
        $this->ciu_nombre = "";
        $this->mensajeoperacion ="";
    }


    public function setear($ciu_id, $ciu_nombre)    {
        $this->setid($ciu_id);
        $this->setNombre($ciu_nombre);

    }


    public function getid(){
        return $this->ciu_id;
    }

    public function setid($valor){
        $this->ciu_id = $valor;
    }

    public function getNombre(){
        return $this->ciu_nombre;
    }

    public function setNombre($valor){
        $this->ciu_nombre = $valor;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }

    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

 
    public function buscar($ciu_id){
        $base = new BaseDatos();
        $exito = false;
        $sql = "Select * from ciudad where ciu_id = " . $ciu_id;
        if($base ->Iniciar()){
            if($base->Ejecutar($sql)){
                if($row = $base->Registro()){
                    $this -> setid($ciu_id);
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
        $sql  =  "INSERT INTO ciudad(ciu_id, ciu_nombre)  VALUES("
        .$this->getid().", '"
        .$this->getNombre()."'";
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
        ciu_nombre = '".$this->getNombre()."'
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
                    $obj->setear($row['ciu_id'], $row['ciu_nombre']);
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