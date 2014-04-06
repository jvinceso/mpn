<?php
class Loaders {
    //CREA MENU DE OPCIONES
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('objeto_model');
        $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2).'.html';
        $CI->session->set_userdata( array('url' => $url) );
        return $CI->objeto_model->listaMenuOpciones();
    } 

    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso() {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('nUsuId');
        // print_p($iduser);
        if($iduser){
            $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2).'.html';
            // print_p($url);
            $query = $CI->db->query("SELECT * FROM usuario_objeto uo
                    INNER JOIN usuario u ON u.nUsuId = uo.nUsuId
                    INNER JOIN objeto o ON o.nObjId = uo.nObjId
                    INNER JOIN objeto_detalle od ON od.nObjId = o.nObjId
                WHERE od.cOdetNombreArchivo = ? AND u.nUsuId = ?", array($url,$iduser));

            if ($query->num_rows() > 0) {
                return true;
            }
            show_error(utf8_decode('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="'.URL_IMG.'error.gif"/><h2 style="color:black;">No cuenta con los privilegios suficientes para acceder a esta pagina.</h2><h4 style="color:black;"><i>Su intento ha sido registrado, y conocemos a su familia. JA JA JA!</i><br/>Si vuelve a intentarlo, gringasho visitará mañana su hogar .</h4></p></center></div></center>'), 500);
        }
        else{
            redirect('/login');
        }
    }

}
?>