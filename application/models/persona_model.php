<?php

//CODIGO AUTOGENERADO - @DIVISOFT
class Persona_model extends CI_Model {

    //atributos 
    private $PerId = '';
    private $PerApellidoPaterno = '';
    private $PerApellidoMaterno = '';
    private $PerNombres = '';
    private $PerContribuyente = 'SI';
    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
        $this->PerContribuyente = 'SI';
    }


    //propiedades setters
    public function getPerId() {
        return $this->PerId;
    }

    public function setPerId($PerId) {
        $this->PerId = $PerId;
    }

    public function getPerApellidoPaterno() {
        return $this->PerApellidoPaterno;
    }

    public function setPerApellidoPaterno($PerApellidoPaterno) {
        $this->PerApellidoPaterno = $PerApellidoPaterno;
    }

    public function getPerApellidoMaterno() {
        return $this->PerApellidoMaterno;
    }

    public function setPerApellidoMaterno($PerApellidoMaterno) {
        $this->PerApellidoMaterno = $PerApellidoMaterno;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    } 

    public function getPerContribuyente() {
        return $this->PerContribuyente;
    }

    public function setPerContribuyente($PerContribuyente) {
        $this->PerContribuyente = $PerContribuyente;
    }

    public function insPersona(){
        $persona = array(
            'cPerApellidoPaterno'  =>  $this->getPerApellidoPaterno(),
            'cPerApellidoMaterno'  =>  $this->getPerApellidoMaterno(),
            'cPerNombres'          =>  $this->getPerNombres(),
            'cPerRandom'           =>  '12345',
            'cPerContribuyente'    =>  $this->getPerContribuyente()
            );
        $this->db->insert('persona', $persona);        
        $this->setPerId($this->db->insert_id());  
        return $this->db->insert_id();
    }
}

?>