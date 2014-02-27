<?php
class Loaders {
    //CREA MENU DE OPCIONES
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('menu_model', 'objMenu');
        $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        $CI->session->set_userdata( array('url' => $url) );
        return $CI->objMenu->listaMenuOpciones();
    } 

    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso() {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('IdUsuario');
        if($iduser){
            $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2); 
            $query = $CI->db->query("SELECT per.*, men.* FROM permiso per 
                INNER JOIN usuario usu ON usu.nUsuId = per.nUsuCodigo
                INNER JOIN menu men ON men.nMenId = per.nMenId WHERE men.cMenUrl= ? AND usu.nUsuId=? ", array($url,$iduser));

            if ($query->num_rows() > 0) {
                return true;
            }
            show_error(utf8_decode('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="'.URL_IMG.'error.gif"/><h2 style="color:black;">No cuenta con los privilegios suficientes para acceder a esta pagina.</h2><h4 style="color:black;"><i>Su intento ha sido registrado, y conocemos a su familia. JA JA JA!</i><br/>Si vuelve a intentarlo, gringasho visitará mañana su hogar .</h4></p></center></div></center>'), 500);
        }
        else{
            redirect('/');
        }
    }

}
?>