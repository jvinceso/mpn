<?php
$txt_hdn_persona = form_hidden( array('txt_hdn_nPerid'=> $persona['nPerId']) );
switch ( $opcion ) {
    case 'normal':
        echo $txt_hdn_persona;
        ?>
        <script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS ?>sistema/agua/contribuyente/contribuyente_recibos.js"></script>
        <style>
        .pagado{
            background: blue;
        }
        .cobrar{
            background: red;
        }
        </style>
        <center>
            <img src="<?php echo URL_IMG; ?>essen/16/business-contact.png" alt="">&nbsp;<b><?php echo strtoupper($persona['apellido'] . ", " . $persona['nombre']); ?></b>
            <br/><br/>
        </center>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="cbo_anios"> Año</label>
            <div class="col-sm-9">
                <div id="c_cbo_anios">
                    <?php 
                    echo form_dropdown("cbo_anio_recibo", creaCombo( $anios ) ,'', 'id="cbo_anio_recibo" class="chosen-select w360"');
                    ?>
                </div>
            </div>
        </div>
        <div id="msg_alertas_direcciones"></div>
            <p>&nbsp;</p>
        <div id="c_qry_direccion_contribuyente" class="table-responsive">
        <?php
    break;
    
    case 'list':
        echo '<div class="table-responsive">';
    break;
}
if($recibos_contribuyente){
    $opciones = array(
        'Pagos' => array(
            'color'=>'blue'
            ,'icono'=>'cloud-upload'
            ,'tooltip'=>'success'
         ),
        'Imprimir' => array(
            'color'=>'blue'
            ,'icono'=>'print'
            ,'tooltip'=>'info'
         )
    );
    $tabla_data = $recibos_contribuyente;
    $funciones = array(
         'initEvtOpc("cloud-upload","pagarRecibo(fila)")'
        ,'initEvtOpcPopupId("print","recibo/vistaPrevia/","Vista Previa Recibo",920,400,"func_close")',
        );
    $nameTable = 'tabla-direcccion-contribuyente';
    $pk = 'ID';
    CrudGridMultipleJson($recibos_contribuyente,$nameTable,$pk,$opciones,$funciones); 
}else{
    ?>
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Cuidado!</strong>
        Los Arbitrios del contribuyente en el presente año <?php echo date("Y"); ?> A&uacute;n no han sido generados 
        <br>
    </div>
    <?php
}
?>
</div>