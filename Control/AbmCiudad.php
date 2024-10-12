<?php
class AbmCiudad{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Ciudad
     */
    private function cargarObjeto($param){
        $objCiudad = null;

        if( array_key_exists('ciu_id',$param) and 
        array_key_exists('ciu_nombre',$param) and
        array_key_exists('ciu_latitud',$param) and
        array_key_exists('ciu_longitud',$param))
        {
            $objCiudad = new Ciudad();
            $objCiudad->setear($param['ciu_id'],  $param['ciu_nombre'],  $param['ciu_latitud'], $param['ciu_longitud']);
        }
        return $objCiudad;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Ciudad
     */
    private function cargarObjetoConClave($param){
        $objCiudad = null;
        
        if( isset($param['ciu_id']) )
        {
            $objCiudad = new Ciudad();
            $objCiudad->setear($param['ciu_id'], null, null, null, );
        }
        return $objCiudad;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['ciu_id']))
            $resp = true;
        return $resp;
    }
    

    /**
     * 
     * @param array $param
     * @return boolean
     */
    public function alta($param){
        $resp = false;
        if($this->validarTodo($param)){
            $elObjCiudad = $this->cargarObjeto($param);
            if ($elObjCiudad != null and $elObjCiudad->insertar())
            {
                $resp = true;
            }
        }
        return $resp;
    }


    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param))
        {
            $elObjCiudad = $this->cargarObjetoConClave($param);
            if ($elObjCiudad != null and $elObjCiudad->eliminar())
            {
                $resp = true;
            }
        }
        return $resp;
    }
    
        /**
     * Buscar si la Ciudad tiene un Comercio
     * @param array $param
     * @return boolean
     */
    public function verificarComercio($param){
        $resp = false;
        $objAbmComercio = new AbmComercio();
        $listaComercio = $objAbmComercio->buscar($param);
        if(!empty($listaComercio)){
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if($this->validarTodo($param)){
            if ($this->seteadosCamposClaves($param))
            {
                $elObjCiudad = $this->cargarObjeto($param);
                if($elObjCiudad != null and $elObjCiudad->modificar())
                {
                    $resp = true;
                }
            }
        }
        return $resp;
    }



    /**
     * @param string $id
     * @return object $CiudadEncontrada
     */

     public function buscarCiudad($id){
        $objP = new Ciudad();
        $CiudadEncontrada = null;
        if($objP ->buscar($id)){    
            $CiudadEncontrada = $objP;
        }

        return $CiudadEncontrada;
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
            if (isset($param['ciu_id']))
                $where .= " and ciu_id = '".$param['ciu_id']."'";
            if (isset($param['ciu_nombre']))
                $where .= " and ciu_nombre = '".$param['ciu_nombre']."'";    
            if (isset($param['ciu_latitud']))
                $where .= " and ciu_latitud = '".$param['ciu_latitud']."'";   
            if (isset($param['ciu_longitud']))
                $where .= " and Domicilio = '".$param['ciu_longitud']."'";   
        }
        $arreglo = Ciudad::listar($where);  
        return $arreglo;
    }


/**
 * Validar en el servidor 
 * Recibe como parametro el arreglo completo y la clave aser validada
 * @param array $param
 * @param string $key
 * @return boolean
 */
public function vXc($param, $key){
    $bool   = false;
    $options['ciu_id']      = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));
    $options['Apellido']    = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['ciu_nombre']      = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['fechaNac']    = array('options' => array("regexp"=>"/^[0-3][0-9]{1}-[0-9]{2}-[0-9]{3}[0-9]$/"));
    $options['ciu_latitud']    = array('options' => array("regexp"=>"/^[1-9][0-9]{1,3}-[0-9]{4,9}[0-9]$/"));
    $options['ciu_longitud']   = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ'°0-9]{1,40}[A-z0-9]$/"));
    if ($param <> NULL)
    {
        if (($param[$key] != 'null') && (filter_var($param[$key], FILTER_VALIDATE_REGEXP, $options[$key]) !== FALSE)) {
            //exepciones
            if(($key === 'fechaNac')){
                $dia = substr($param[$key],0,2);
                $mes = substr($param[$key],3,2);
                $ani = substr($param[$key],6,4);
                $bool = checkdate($mes,$dia,$ani) ? true : false;
            }elseif($key === 'Modelo'){$bool = ($param[$key] <= date("Y")) ? true : false;
            }else{                     $bool = true;
            }
        }else{           $bool = false;
        }
    }
    return $bool;
}
// ***************************************************************************************************
/**
 * Validar en el servidor 
 * Recibe como parametro el arreglo completo y la clave aser validada
 * @param array
 * @return boolean
 */
public function validarTodo($param){
    $bool   = false;
    $listaKey = ['ciu_id', 'Apellido', 'ciu_nombre', 'ciu_latitud', 'ciu_longitud'];
    $options['ciu_id']      = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));
    $options['Apellido']    = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['ciu_nombre']      = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    //$options['fechaNac']    = array('options' => array("regexp"=>"/^[0-3][0-9]{1}-[0-9]{2}-[0-9]{3}[0-9]$/"));
    $options['ciu_latitud']    = array('options' => array("regexp"=>"/^[1-9][0-9]{1,3}-[0-9]{4,9}[0-9]$/"));
    $options['ciu_longitud']   = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ'°0-9]{1,40}[A-z0-9]$/"));
    if ($param <> NULL)
    {
        foreach ($listaKey as $key){
            if (($param[$key] != 'null') && (filter_var($param[$key], FILTER_VALIDATE_REGEXP, $options[$key]) !== FALSE)) {
                //exepciones
                if(($key === 'fechaNac')){
                    $dia = substr($param[$key],0,4);
                    $mes = substr($param[$key],5,2);
                    $ani = substr($param[$key],8,2);
                    $bool = checkdate($mes,$dia,$ani) ? true : false;
                    
                }elseif($key === 'Modelo'){$bool = ($param[$key] <= date("Y")) ? true : false;
                }else{     $bool = true;
                }
            }else{         $bool = false;
            }
            if ($bool === false) break;
        }
    }
    
    return $bool;
}
}
?>