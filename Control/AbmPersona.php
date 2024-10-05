<?php
class AbmPersona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $objPersona = null;

        if( array_key_exists('NroDni',$param) and 
        array_key_exists('Apellido',$param) and
        array_key_exists('Nombre',$param) and
        array_key_exists('fechaNac',$param) and
        array_key_exists('Telefono',$param) and
        array_key_exists('Domicilio',$param))
        {
            $objPersona = new Persona();
            $objPersona->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $objPersona;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $objPersona = null;
        
        if( isset($param['NroDni']) )
        {
            $objPersona = new Persona();
            $objPersona->setear($param['NroDni'], null, null, null, null, null);
        }
        return $objPersona;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni']))
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
            $elObjPersona = $this->cargarObjeto($param);
            if ($elObjPersona != null and $elObjPersona->insertar())
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
            $elObjPersona = $this->cargarObjetoConClave($param);
            if ($elObjPersona != null and $elObjPersona->eliminar())
            {
                $resp = true;
            }
        }
        return $resp;
    }
    
        /**
     * Buscar si la persona tiene un auto
     * @param array $param
     * @return boolean
     */
    public function verificarAuto($param){
        $resp = false;
        $objAbmAuto = new AbmAuto();
        $enviar['DniDuenio'] = $param['NroDni'];
        $listaAuto = $objAbmAuto->buscar($enviar);
        if(!empty($listaAuto)){
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
                $elObjPersona = $this->cargarObjeto($param);
                if($elObjPersona != null and $elObjPersona->modificar())
                {
                    $resp = true;
                }
            }
        }
        return $resp;
    }



    /**
     * @param string $dni
     * @return object $personaEncontrada
     */

     public function buscarPersona($dni){
        $objP = new Persona();
        $personaEncontrada = null;
        if($objP ->buscar($dni)){    
            $personaEncontrada = $objP;
        }

        return $personaEncontrada;
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
            if (isset($param['NroDni']))
                $where .= " and NroDni = '".$param['NroDni']."'";
            if (isset($param['Apellido']))
                $where .= " and Apellido = '".$param['Apellido']."'";
            if (isset($param['Nombre']))
                $where .= " and Nombre = '".$param['Nombre']."'";  
            if (isset($param['fechaNac']))
                $where .= " and fechaNac = '".$param['fechaNac']."'";    
            if (isset($param['Telefono']))
                $where .= " and Telefono = '".$param['Telefono']."'";   
            if (isset($param['Domicilio']))
                $where .= " and Domicilio = '".$param['Domicilio']."'";   
        }
        $arreglo = Persona::listar($where);  
        return $arreglo;
    }

    /**
     * permite buscar una persona por dni parcial
     * @param $dni
     * @return array
     */
    public function buscarPorDni($dni){
            $where = " NroDni LIKE '%".$dni."%'";     
        $arreglo = Persona::listar($where);  
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
    $options['NroDni']      = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));
    $options['Apellido']    = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['Nombre']      = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['fechaNac']    = array('options' => array("regexp"=>"/^[0-3][0-9]{1}-[0-9]{2}-[0-9]{3}[0-9]$/"));
    $options['Telefono']    = array('options' => array("regexp"=>"/^[1-9][0-9]{1,3}-[0-9]{4,9}[0-9]$/"));
    $options['Domicilio']   = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ'°0-9]{1,40}[A-z0-9]$/"));
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
    $listaKey = ['NroDni', 'Apellido', 'Nombre', 'Telefono', 'Domicilio'];
    $options['NroDni']      = array('options' => array("regexp"=>"/^[1-9][0-9]{5,6}[0-9]$/"));
    $options['Apellido']    = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    $options['Nombre']      = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ']{0,40}[A-z]$/"));
    //$options['fechaNac']    = array('options' => array("regexp"=>"/^[0-3][0-9]{1}-[0-9]{2}-[0-9]{3}[0-9]$/"));
    $options['Telefono']    = array('options' => array("regexp"=>"/^[1-9][0-9]{1,3}-[0-9]{4,9}[0-9]$/"));
    $options['Domicilio']   = array('options' => array("regexp"=>"/^[A-Z][A-z\sáéíóúüñÁÉÍÓÚÜÑ'°0-9]{1,40}[A-z0-9]$/"));
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