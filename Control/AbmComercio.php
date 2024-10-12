<?php
class AbmComercio{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto
     * @param array $param
     * @return Comercio
     */
    private function cargarObjeto($param){
        $objComercio = null; //Inicializo variable

        if( array_key_exists('com_id',$param) and 
        array_key_exists('com_nombre',$param) and
        array_key_exists('ciu_id',$param))
        {
            $objComercio = new Comercio();
            $objCiudad = new Ciudad();
            $objCiudad->setid( $param['ciu_id']);
            $objCiudad->buscar($param['ciu_id']);
            $objComercio->setear($param['com_id'], $param['com_nombre'],  $objCiudad);
        }
        return $objComercio;
    }
    

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto que son claves
     * @param array $param
     * @return Comercio
     */
    private function cargarObjetoConClave($param){
        $objComercio = null;
        
        if( isset($param['com_id']) )
        {
            $objComercio = new Comercio();
            $objComercio->setear($param['com_id'], null, null);
        }
        return $objComercio;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['com_id']))
            $resp = true;
        return $resp;
    }
    

    /**
     * 
     * @param array $param
     * @return bool
     */
    public function alta($param){
        $resp = false;
        if($this->validarTodoComercio($param)){
            $elObjComercio = $this->cargarObjeto($param);
            if ($elObjComercio != null and $elObjComercio->insertar())
            {
                $resp = true;
            }
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return bool
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param))
        {
            $elObjComercio = $this->cargarObjetoConClave($param);
            if ($elObjComercio!=null and $elObjComercio->eliminar())
            {
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if($this->validarTodoComercio($param)){
            if ($this->seteadosCamposClaves($param))
            {
                $elObjComercio = $this->cargarObjeto($param);
                if($elObjComercio != null and $elObjComercio->modificar())
                {
                    $resp = true;
                }
            }
        }
        return $resp;
    }



    
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";

        if ($param <> NULL)
        {
            if (isset($param['com_id']))
            $where .= " and com_id = '".$param['com_id']."'";
            if (isset($param['ciu_id']))
            $where .= " and ciu_id = '".$param['ciu_id']."'";    
        }
        $arreglo = Comercio::listar($where);
        return $arreglo;
    }

        /**
     * permite modificar la ciudad del comercio
     * @param array
     * @return boolean
     */
    public function modificarCiudad($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjComercio = $this->cargarObjetoConClave($param);
            $elObjComercio->cargar(); 
            $objCiudad =  new Ciudad();
            $objCiudad->setid( $param['ciu_id']);
            $objCiudad->buscar($param['ciu_id']);
            $elObjComercio->setobjCiudad($objCiudad);

            if($elObjComercio != null and $elObjComercio->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }



/**
 * Validar en el servidor 
 * Recibe como parametro el arreglo completo y la clave aser validada
 * @param $key
 * @param array
 * @return boolean
 */
 public function vXc($param, $key){
    $bool   = true;
    $options['com_nombre']     = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{1,40}[A-z]$/"));
    $options['com_id']   = array('options' => array("regexp"=>"/^[A-Z][A-Z]{2}[\s]{1}[0-9]{2}[0-9]$|^[A-Z][A-Z]{1}[\s]{1}[0-9]{3}[\s]{1}[A-Z]{1}[A-Z]$/"));
    $options['Modelo']    = array('options' => array("regexp"=>"/^[3-9][0-9]$|^[1][9]{1}[3-9]{1}[0-9]$|^[2][0]{1}[0-9]{1}[0-9]$/"));
    $options['ciu_id'] = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));

    if ($param <> NULL)
    {                 
        if (($param[$key] != 'null') && (filter_var($param[$key], FILTER_VALIDATE_REGEXP, $options[$key]) !== FALSE)) {
                //exepciones
                if($key === 'Modelo'){
                    $bool = ($param[$key] <= date("Y")) ? true : false;
                }else{   $bool = true;  }
            }else{    $bool = false;    }
    }
    return $bool;
}
//****************************************************************************************** */

/**
 * Validar en el servidor 
 * Recibe como parametro el arreglo completo y la clave a ser validada
 * @param array
 * @return boolean
 */
public function validarTodoComercio($param){
    $bool   = false;
    $listaKey = ['com_id', 'com_nombre', 'Modelo', 'ciu_id'];
    $options['com_nombre']     = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{1,40}[A-z]$/"));
    $options['com_id']   = array('options' => array("regexp"=>"/^[A-Z][A-Z]{2}[\s]{1}[0-9]{2}[0-9]$|^[A-Z][A-Z]{1}[\s]{1}[0-9]{3}[\s]{1}[A-Z]{1}[A-Z]$/"));
    $options['Modelo']    = array('options' => array("regexp"=>"/^[3-9][0-9]$|^[1][9]{1}[3-9]{1}[0-9]$|^[2][0]{1}[0-9]{1}[0-9]$/"));
    $options['ciu_id'] = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));
    if ($param <> NULL)
    {
        foreach ($listaKey as $key){
            if (($param[$key] != 'null') && (filter_var($param[$key], FILTER_VALIDATE_REGEXP, $options[$key]) !== FALSE)) {
                //exepciones
                if($key === 'Modelo'){
                    $bool = ($param[$key] <= date("Y")) ? true : false;
                }else{
                    $bool = true;
                }
            }else{
                $bool = false;
            }
            if ($bool === false) break;
        }
    }
    
    return $bool;
}

}
?>