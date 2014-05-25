<?php
$atributosForm = array('id' => 'frm_ins_servicio_contribuyente', 'name' => 'frm_ins_servicio_contribuyente');
$txt_hdn_direccion_persona = form_hidden(array( 'txt_hdn_nPdeId'=>$codDireccion, 'txt_persona_id' => $nPerId ));
$cboServicioTipo = form_dropdown("cboServicioTipo", creaCombo($cboServiciosTipo),'', 'id="cboServicioTipo" class="chosen-select w360"');
$btn_serviciotipo = form_submit('btn_serviciotipo', 'Agregar', 'id="btn_serviciotipo" data-loading-text="Registrando..."  class="btn btn-purple btn-sm"');
echo $txt_hdn_direccion_persona;
?>
<script type="text/javascript" src="<?php echo URL_JS ?>sistema/agua/contribuyente/servicio_tipo_panel.js"></script>
<center>
    <br/><br/>
    <?php echo form_open('', $atributosForm); ?>

    <div class="row">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Servicio & Tipo</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <?php
                echo $cboServicioTipo;
                ?>
                <span class="input-group-btn">
                    <button  id="btn_serviciotipo" name = "btn_serviciotipo" class="btn btn-info btn-sm" type="submit" data-loading-text="Registrando...">
                        Agregar
                        <i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

</center>
<?php echo form_close(); ?>
<p>&nbsp;</p>
<div class="table-header">Servicios Asignados</div>
<div id="c_qry_serviciostipo" class="table-responsive">
    <?php 
    $opciones = array(
        'Eliminar' => array(
           'color'=>'red'
           ,'icono'=>'trash'
           ,'tooltip'=>'danger'
           )
        );    
    $funciones = array(
        'initEvtDel("eliminarServicioTipo");'
        );
    $nameTable = 'tabla-servicios-direccion';
    $pk = 'ID';
    CrudGridMultipleJson($servicios_prestados,$nameTable,$pk,$opciones,$funciones); 
    ?>
</div>
