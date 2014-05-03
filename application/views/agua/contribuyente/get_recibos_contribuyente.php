<?php
$txt_hdn_persona = form_hidden(array('txt_hdn_nPerid'=> $persona['nPerId'] , 'txt_hdn_nMulId' => $persona['nMulId'] ));
echo $txt_hdn_persona;
?>
<script type="text/javascript" src="<?php echo URL_JS ?>sistema/agua/contribuyente/contribuyente_recibos.js"></script>
<center>
    <img src="<?php echo URL_IMG; ?>essen/16/business-contact.png" alt="">&nbsp;<b><?php echo strtoupper($persona['apellido'] . ", " . $persona['nombre']); ?></b>
    <br/><br/>
</center>
<div id="msg_alertas_direcciones"></div>
<p>&nbsp;</p>
<div id="c_qry_direccion_contribuyente" class="table-responsive">
    <?php 
    $opciones = array(
        'Pagos' => array(
             'color'=>'blue'
            ,'icono'=>'cloud-upload'
            ,'tooltip'=>'success'
        )
    );
    $tabla_data = $objDireccion;
    $funciones = array(
        'initEvtOpc("cloud-upload","asignarTipo(fila)")'
    );
    $nameTable = 'tabla-direcccion-contribuyente';
    $pk = 'ID';
    CrudGridMultipleJson($objDireccion,$nameTable,$pk,$opciones,$funciones); 
    ?>
</div>
