<?php

//CODIGO AUTOGENERADO - @DIVISOFT
class Persona_model extends CI_Model {

    //atributos 
    private $PerId = '';
    private $PerApellidoPaterno = '';
    private $PerApellidoMaterno = '';
    private $PerNombres = '';
    private $PerDNI = '';
    private $PerSexo = '';
    private $PerFechaNacimiento = '';
    private $PerDireccion = '';
    private $PerEmail = '';
    private $PerTelefono = '';
    private $PerCelular = '';
    private $PerEstadoCivil = '';
    // private $PerUsuario = '';
    // private $PerClave = '';
    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
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

    public function getPerDNI() {
        return $this->PerDNI;
    }

    public function setPerDNI($PerDNI) {
        $this->PerDNI = $PerDNI;
    }

    public function getPerSexo() {
        return $this->PerSexo;
    }

    public function setPerSexo($PerSexo) {
        $this->PerSexo = $PerSexo;
    }

    public function getPerFechaNacimiento() {
        return $this->PerFechaNacimiento;
    }

    public function setPerFechaNacimiento($PerFechaNacimiento) {
        $this->PerFechaNacimiento = $PerFechaNacimiento;
    }

    public function getPerDireccion() {
        return $this->PerDireccion;
    }

    public function setPerDireccion($PerDireccion) {
        $this->PerDireccion = $PerDireccion;
    }

    public function getPerEmail() {
        return $this->PerEmail;
    }

    public function setPerEmail($PerEmail) {
        $this->PerEmail = $PerEmail;
    }

    public function getPerTelefono() {
        return $this->PerTelefono;
    }

    public function setPerTelefono($PerTelefono) {
        $this->PerTelefono = $PerTelefono;
    }

    public function getPerCelular() {
        return $this->PerCelular;
    }

    public function setPerCelular($PerCelular) {
        $this->PerCelular = $PerCelular;
    }

    public function getPerEstadoCivil() {
        return $this->PerEstadoCivil;
    }

    public function setPerEstadoCivil($PerEstadoCivil) {
        $this->PerEstadoCivil = $PerEstadoCivil;
    }



    public function insPersona(){
        $persona = array(
            'cPerApellidoPaterno'  =>  $this->getPerApellidoPaterno(),
            'cPerApellidoMaterno'  =>  $this->getPerApellidoMaterno(),
            'cPerNombres'          =>  $this->getPerNombres(),
            'cPerRandom'           =>  '12345'
            );
        $this->db->insert('persona', $persona);
        $this->setPerId($this->db->insert_id());  
    }
}

?>