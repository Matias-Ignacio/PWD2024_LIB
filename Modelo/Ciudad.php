<?php 
class Ciudad extends BaseDatos {
    private $ciu_id;
    private $ciu_nombre;

    private $mensajeoperacion;


    public function __construct(){
        parent::__construct();
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
        $sql  =  "INSERT INTO ciudad(ciu_nombre)  VALUES('".$this->getNombre()."');";
        if ($this->Iniciar()) {
            if($id = $this->Ejecutar($sql)){
                $this->setId($id);
                $resp = true;
            }else{
                $this->setmensajeoperacion("Ciudad->insertar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudada->insertar: ".$this->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $sql = "UPDATE ciudad SET 
        ciu_nombre = '".$this->getNombre()."'
        WHERE ciu_id = ".$this->getid();
        if ($this->Iniciar()) {
            if($this->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Ciudad->modificar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudad->modificar: ".$this->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $sql = "DELETE FROM ciudad WHERE ciu_id = '".$this->getid()."'";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            }else{
                $this->setmensajeoperacion("Ciudad->eliminar: ".$this->getError());
            }
        }else{
            $this->setmensajeoperacion("Ciudad->eliminar: ".$this->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $sql = "SELECT * FROM ciudad ";
        if ($parametro != "") {
            $sql .= " WHERE " .$parametro;
        }
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    
                    while ($row = $this->Registro()){
                        $obj = new Ciudad();
                        $obj->setear($row['ciu_id'], $row['ciu_nombre']);
                        array_push($arreglo, $obj);
                    }
                }
            }else{
                $this->setmensajeoperacion("Ciudad->listar: ".$this->getError());
            }
        }
        return $arreglo;
    }
}

?>