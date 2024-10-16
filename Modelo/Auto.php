<?php 
class Auto {
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio;
    private $mensajeoperacion;


    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = new Persona();
        $this->mensajeoperacion = "";
    }

    public function setear($patente, $marca, $modelo, $objDuenio)    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
    }

    public function getPatente(){
        return $this->patente;
    }
    public function setPatente($valor){
        $this->patente = $valor;
    }
    
    public function getMarca(){
        return $this->marca;  
    }

    public function setMarca($valor){
        $this->marca = $valor; 
    }

    public function getModelo(){
        return $this->modelo;  
    }

    public function setModelo($valor){
        $this->modelo = $valor; 
    }

    public function getObjDuenio(){
        return $this->objDuenio;  
    }

    public function setObjDuenio($obj){
        $this->objDuenio = $obj; 
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
        $objDuenio = new Persona();     
        $sql = "SELECT * FROM auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    $row = $base->Registro();
                    $objDuenio->setNroDni( $row['DniDuenio']);
                    $objDuenio->buscar($row['DniDuenio']);
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio); 
                }
            }
        }else{
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    }


    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio)  VALUES ('"
        .$this->getPatente()."', '"
        .$this->getMarca()."', '"
        .$this->getModelo()."', '"
        .$this->getObjDuenio()->getNroDni()."');";
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }


    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET 
        Marca = '".$this->getMarca()."', 
        Modelo = '".$this->getModelo()."', 
        DniDuenio = '".$this->getObjDuenio()->getNroDni()."' WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }


    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            }else{
                $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }


    public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($parametro != "") {
            $sql .= " WHERE " .$parametro;
        }
        
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                while ($row = $base->Registro()){
                    $obj = new Auto();
                    $objDuenio = new Persona();
                    $objDuenio->setNroDni( $row['DniDuenio']);
                    $objDuenio->buscar($row['DniDuenio']);
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            self::setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
    /**
     * Obtiene la cantidad de autos agrupados por marca 
     * Ejecuta una consulta SQL para contar la cantidad de autos agrupados por marca
     * Devuelve un array con los resultados o false en caso de error.
     * @return array Devuelve un array con las marcas y la cantidad de autos, o false si ocurre un error.
     */
    public function obtenerCantidadAutosPorMarca(){
        $base = new BaseDatos();
        $sql = "SELECT Marca, COUNT(*) as cantidad FROM auto GROUP BY Marca";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resultado = [];
                while ($row = $base->Registro()){
                    $resultado[] = $row;
                }
            }else{
                $this->mensajeoperacion = $base->getError();
                $resultado = false;
            }
        }else{
            $this->mensajeoperacion = $base->getError();
            $resultado = false;
        }
        return $resultado;
    }
}
?>