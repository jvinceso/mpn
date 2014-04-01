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

//¿que uso tiene?
    function get_persona_areaid($dniper) {
        // $this->adampt->Liberar();
        $this->adampt->setParam($dniper);
        $query = $this->adampt->getCampo('shm_gen.USP_GEN_S_AREAXDNI', 7);
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    function datos_personaGet($query) {
        if (count($query) > 0) {
            $this->setPerArea($query[0]['IDArea']   /*$this->get_persona_areaid($query[0]['Dni'])*/);
            $this->setPerId($query[0]['IDPer']);
            $this->setPerApellidoPaterno($query[0]['ApellidoPaterno']);
            $this->setPerApellidoMaterno($query[0]['ApellidoMaterno']);
            $this->setPerNombres($query[0]['Nombres']);
            $this->setDocIdentidad($query[0]['Dni']);
            $this->setPerEmail($query[0]['Email']);
            $this->setPerNombreArea($query[0]['NombreArea']);
            return true;
        } else {
            return false;
        }
    }
    function personaGet($nPerId) {
        $this->adampt->setParam('L-P-DETALLE');
        $this->adampt->setParam($nPerId);
        $query = $this->adampt->consulta('shm_per.USP_GEN_S_PERSONAS');
//        print_r($query);exit;
        if (count($query) > 0) {
            $this->setPerArea($this->get_persona_areaid($query[0]['cPdeValor']));
            $this->setPerId($query[0]['nPerId']);
            $this->setPerApellidoPaterno($query[0]['cPerApellidoPaterno']);
            $this->setPerApellidoMaterno($query[0]['cPerApellidoMaterno']);
            $this->setPerNombres($query[0]['cPerNombres']);
            $this->setPerEstado($query[0]['bPerEstado']);
            $this->setPerFechaRegistro($query[0]['fPerFechaRegistro']);
            $this->setDocIdentidad($query[0]['cPdeValor']);
            $this->setPerSexo($query[0]['bPnaSexo']);
            $this->setPerTipoDocumento($query[0]['TIPODOCUMENTO']);
            $this->setPerFechaNacimiento($query[0]['fPnaFechaNacimiento']);
            $this->setPerTelefono($query[0]['TELEFONO']);
            $this->setPerCelular($query[0]['CELULAR']);
            $this->setPerEstadoCivil($query[0]['ESTADOCIVIL']);
            $this->setPerEmail($query[0]['EMAIL']);
            $this->setPerDireccion($query[0]['DIRECCION']);
            $this->setPerDepartamento($query[0]['cUbiIdDepartamento']);
            $this->setPerProvincia($query[0]['cUbiIdProvincia']);
            $this->setPerDistrito($query[0]['cUbiIdDistrito']);

            return true;
        } else {
            return false;
        }
    }

    function personasQry($parametros) {
        $this->adampt->setParam($parametros['@Accion']);
        $this->adampt->setParam($parametros['@Criterio']);
        $query = $this->adampt->consulta('shm_per.USP_GEN_S_PERSONAS');
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

    public function persona_documento_Get($param) {
        $this->adampt->setParam($param['accion']);
        $this->adampt->setParam($param['criterio']);
        $this->adampt->setParam($param['tipo']);
        $query = $this->adampt->consulta('shm_per.USP_GEN_S_PERSONAS');
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
        // [] 'L-P-PUBLI',11436,'Tipo'     
    }

    function personaUpd() {
//        echo $this->getPerId();exit;
        $this->adampt->setParam($this->getPerId());
        $this->adampt->setParam($this->getPerApellidoPaterno());
        $this->adampt->setParam($this->getPerApellidoMaterno());
        $this->adampt->setParam($this->getPerNombres());
        $this->adampt->setParam($this->getPerSexo());
        $this->adampt->setParam($this->getPerFechaNacimiento());
        $this->adampt->setParam($this->getPerDepartamento());
        $this->adampt->setParam($this->getPerProvincia());
        $this->adampt->setParam($this->getPerDistrito());
        $this->adampt->setParam($this->getPerDireccion());
        $this->adampt->setParam($this->getPerEmail());
        $this->adampt->setParam($this->getPerTelefono());
        $this->adampt->setParam($this->getPerCelular());
        $this->adampt->setParam($this->getPerEstadoCivil());
        $this->adampt->prepara('shm_per.USP_GEN_U_DATOS_PERSONA');
        $query = $this->adampt->ejecuta();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function personaIns($TipoDocumento) {
        $this->adampt->setParam($this->getPerApellidoPaterno());
        $this->adampt->setParam($this->getPerApellidoMaterno());
        $this->adampt->setParam($this->getPerNombres());
        $this->adampt->setParam($this->getPerSexo());
        $this->adampt->setParam($this->getPerFechaNacimiento());
        $this->adampt->setParam($this->getPerDepartamento());
        $this->adampt->setParam($this->getPerProvincia());
        $this->adampt->setParam($this->getPerDistrito());
        $this->adampt->setParam($this->getPerDireccion());
        $this->adampt->setParam($TipoDocumento);
        $this->adampt->setParam($this->getDocIdentidad());
        $this->adampt->setParam($this->getPerEmail());
        $this->adampt->setParam($this->getPerTelefono());
        $this->adampt->setParam($this->getPerCelular());
        $this->adampt->setParam($this->getPerEstadoCivil());
        $this->adampt->setParam($this->getPerUsuario());
        $this->adampt->setParam($this->getPerClave());
        $this->adampt->setParam($this->getPerEstado());
//        echo "OKs";
        $this->adampt->setParamOut1('');
        $this->adampt->prepara('shm_per.USP_GEN_I_DATOS_PERSONA');
        $query = $this->adampt->ejecuta();
        if ($query) {
            $this->setPerId($this->adampt->getParamOut1());
//            echo $this->adampt->getParamOut1();
            return true;
        } else {
            return false;
        }
    }

    function personaDetalleDel($accion, $nPdeId) {
        $this->adampt->setParam($accion);
        $this->adampt->setParam($nPdeId);
        $this->adampt->prepara('shm_per.USP_GEN_U_PERSONA_DETALLE');
        $query = $this->adampt->ejecuta();

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    /* AGREGADO LUIGGI: 13/05/2013 */

    function get_persona_tipodoc($idparametro, $valor) {
        $this->adampt->setParam('b');
        $this->adampt->setParam($idparametro);
        $this->adampt->setParam($valor);
        $query = $this->adampt->getFila('shm_sig.USP_SIG_S_PersonanParId');
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function marcacionesQry($parametros) {
        $this->adampt->setParam($parametros[0]);
        $this->adampt->setParam($parametros[1]);
        $this->adampt->setParam($parametros[2]);
        $query = $this->adampt->consulta('shm_seg.USP_INT_S_MARCACIONES');

        if (count($query) > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function get_persona_detalle_Por_nPerId_nPcaId($nPerId, $nPcaId) {
        if ($nPerId != null && $nPcaId != null) {
            $this->adampt->setParam($nPerId);
            $this->adampt->setParam($nPcaId);
            $query = $this->adampt->consulta('shm_per.USP_GEN_S_PERSONA_DETALLE_Por_nPerId_nPcaId');
            if (count($query) > 0) {
                return $query;
            } else {
                return null;
            }
        }
    }
    
    function get_persona_detalle_Por_nPerId_nParId($nPerId, $nParId, $nPcaId) {
        $this->adampt->setParam($nPerId);
        $this->adampt->setParam($nParId);
        $this->adampt->setParam($nPcaId);

        $query = $this->adampt->consulta('shm_per.USP_GEN_S_PERSONA_DETALLE_Por_nPerId_nParId');

        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function get_persona_detalle_Por_nPdeId($nPdeId) {
        if ($nPdeId != null) {
            $this->adampt->setParam($nPdeId);
            $query = $this->adampt->getFila("shm_per.USP_GEN_S_PersonaDetalle");
            if ($query) {
                if (count($query) == 0) {
                    return false;
                } else {
                    // $fila = $query;
                    return $query;
                }
            } else {
                return false;
            }
        }
        return false;
    }
    function get_persona_detalle_Por_nPdeId_sigma($nPdeId) {
        if ($nPdeId != null) {
            $this->adampt->setParam($nPdeId);
            $query = $this->adampt->getFila("shm_sig.USP_SIG_S_PersonaDetalle");
            if ($query) {
                if (count($query) == 0) {
                    return false;
                } else {
                    // $fila = $query;
                    return $query;
                }
            } else {
                return false;
            }
        }
        return false;
    }

    function Insert_persona_detalle($pid, $nparid, $npcaid, $valor) {
        $this->adampt->setParamOut1(null);
        $this->adampt->setParam($pid);
        $this->adampt->setParam($nparid);
        $this->adampt->setParam($npcaid);
        $this->adampt->setParam($valor);
        $this->adampt->prepara('shm_per.USP_GEN_I_PERSONA_DETALLE');
        $query = $this->adampt->ejecuta();
        if ($query) {
            return $this->adampt->getParamOut1();
        } else {
            return false;
        }
    }

}

?>