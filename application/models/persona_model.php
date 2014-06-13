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

    public function qryContribuyente(){
        return $this->db->query("
            select p.nPerId as ID,p.cPerNombres as Nombre,
            CONCAT( p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno ) as Apellidos
            ,pd1.cPdeValor as DNI
            ,pd2.cPdeValor as telefono
            ,pd3.cPdeValor as celular
            from persona p 
            inner join persona_detalle pd1 on p.nPerId = pd1.nPerId
            inner join persona_detalle pd2 on p.nPerId = pd2.nPerId 
            inner join persona_detalle pd3 on p.nPerId = pd3.nPerId
            where p.cPerContribuyente='SI' and p.cPerEstado=1 and pd1.nMulId = 16 and pd2.nMulId = 43 and pd3.nMulId = 44
            ORDER BY p.nPerId DESC;
            ")->result_array();
        // return $this->db->where(array('cPerContribuyente'=>'SI','cPerEstado'=>1))->get('persona')->result_array();
    }

    public function updPersona(){
        $data = array(
            'cPerApellidoPaterno'  =>  $this->getPerApellidoPaterno(),
            'cPerApellidoMaterno'  =>  $this->getPerApellidoMaterno(),
            'cPerNombres'          =>  $this->getPerNombres(),
            'cPerRandom'           =>  '12345',
            'cPerContribuyente'    =>  $this->getPerContribuyente()
            );

        $this->db->where('nPerId', $this->getPerId());
        $this->db->update('persona', $data); 
        return true;
    }

    public function delContribuyente(){
        $data = array(
            'cPerEstado' => 0
            );
        $this->db->where( 'nPerId', $this->getPerId() );
        $this->db->update( 'persona', $data );
        return true;
    }
    public function qryfndContribuyente(){
        return $this->db->query("
            SELECT  nPerId as id,CONCAT(cPerApellidoPaterno,' ',cPerApellidoMaterno,' ',cPerNombres) as label 
            FROM persona WHERE cPerContribuyente='SI' and cPerEstado = 1  AND MATCH (cPerApellidoPaterno,cPerApellidoMaterno,cPerNombres) AGAINST ('".$this->PerNombres."');
            ")->result_array();        
    }

    public function GetNombreContribuyente(){
        $query = $this->db->query("
            select nPerId as ID,CONCAT(cPerNombres ,' ',cPerApellidoPaterno,' ', cPerApellidoMaterno ) AS DESCRIPCION from persona
            WHERE CONCAT(cPerNombres ,' ',cPerApellidoPaterno,' ', cPerApellidoMaterno ) LIKE '%".$this->getPerNombres()."%'  and cPerContribuyente = 'SI' and cPerEstado = 1
            ");
        return $query->result_array();  
    }
}
?>