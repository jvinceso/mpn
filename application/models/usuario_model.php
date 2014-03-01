<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Autogenered Developed by @jvinceso*/
/* Date : 25-06-2013 01:02:43 */
    class Usuario_model extends CI_Model
    {
        //Atributos de Clase
        private $nUsuId = '';
        private $nPerId = '';
        private $cUsuNick = '';
        private $cUsuNombre = '';
        private $cPerApellidos = '';
        private $nPerCargoID = '';
        private $cPerCarNombre = '';
        private $nSucursalId = '';
        private $cUsuEstado = '';

        //Constructor de Clase
        function __construct()
        {
            parent::__construct();
        }

        //FUNCIONES Set
        function set_nUsuId($nUsuId)
        {
            $this->nUsuId = $nUsuId;
        }
        function set_nPerId($nPerId)
        {
            $this->nPerId = $nPerId;
        }
        function set_cUsuNick($cUsuNick)
        {
            $this->cUsuNick = $cUsuNick;
        }
        function set_cUsuEstado($cUsuEstado)
        {
            $this->cUsuEstado = $cUsuEstado;
        }

        //FUNCIONES Get
        function get_nUsuId()
        {
            return $this->nUsuId;
        }
        function get_nPerId()
        {
            return $this->nPerId;
        }
        function get_cUsuNick()
        {
            return $this->cUsuNick;
        }
        function get_cUsuNombre()
        {
            return $this->cUsuNombre;
        }
        function get_cPerApellidos(){
            return $this->cPerApellidos;
        }
        function get_nPerCargoID(){
            return $this->nPerCargoID;
        }
        function get_cPerCarNombre(){
            return $this->cPerCarNombre;
        }
        function get_cUsuEstado()
        {
            return $this->cUsuEstado;
        }
        function get_nSucursalId()
        {
            return $this->nSucursalId;
        }

        public function getUsuarioSesion(){
            return $this->session->userdata( 'IdUsuario' );
        }
        //Obtener Objeto USUARIO
        function get_ObjUsuario( $objUsuario )
        {
            if ( $objUsuario ) {
                //CREANDO EL OBJETO 
                $this->nUsuId      = $objUsuario->nUsuId;
                $this->nPerId      = $objUsuario->nPerId;
                $this->cUsuNick    = $objUsuario->cUsuNick ;
                $this->cUsuNombre  = $objUsuario->nombre ;
                // $this->cPerApellidos = $objUsuario->cPerApellidos ;
                // $this->nPerCargoID   = $objUsuario->nCargoID ;
                // $this->cPerCarNombre = $objUsuario->cCarNombre ;
            }
        }

        function autenticar($usuario, $clave)
        {
            $query = $this->db->query("CALL sp_s_iniciarsesion (?,?) ", array( trim($usuario), trim($clave) ));
            if ( $query->num_rows() > 0) {
                $row =  $query->row();
                $this->get_ObjUsuario( $query->row() );
                return true;
            }

            return false;
        }

    }
