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
            ,'icono'=>'credit-card'
            ,'tooltip'=>'success'
         ),
        'Recalcular' => array(
            'color'=>'danger'
            ,'icono'=>'retweet'
            ,'tooltip'=>'danger'
         ),
        'Imprimir' => array(
            'color'=>'blue'
            ,'icono'=>'print'
            ,'tooltip'=>'info'
         ),
        'Cancelar' => array(
            'color'=>'danger'
            ,'icono'=>'ban-circle'
            ,'tooltip'=>'danger'
         )
    );
    $tabla_data = $recibos_contribuyente;
    $funciones = array(
         'initEvtOpc("credit-card","pagarRecibo(fila)")',
         'initEvtOpcPopupId("retweet","recibo/datosRecalcularRecibo/","Recalcular Recibo",800,90,"func_close")',      
         'initEvtOpcPopupId("print","recibo/vistaPrevia/","Vista Previa Recibo",920,400,"func_close")',
         'initEvtOpc("ban-circle","EliminarTransferencia(fila)")',
         'disableEliminar()'
        );
    $nameTable = 'tabla-direcccion-contribuyente';
    $pk = 'ID';
    CrudGridMultipleJson($recibos_contribuyente,$nameTable,$pk,$opciones,$funciones); 
    echo '</div>';
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
switch ($opcion) {
    case 'normal':
    ?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="header smaller lighter green">
                <i class="icon-bullhorn"></i>
                Opciones Generales
            </h4>
        <p>
            <button id="btnFrmInsPagos" class="btn btn-danger">Pago Multiple</button>
        </p>
        </div>
    </div>    
    <?php    
    break;
}
?>
</div>