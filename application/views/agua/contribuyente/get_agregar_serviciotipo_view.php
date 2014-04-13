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
        <table class="table-horizontal">
            <tbody>
                <tr>
                    <td class="valign_top_label"><label>Servicio & Tipo :</label></td>
                    <td class="valign_top_control">
                        <?php
                            echo $cboServicioTipo;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <center>
            <?php echo $btn_serviciotipo; ?>
        </center>
</center>
<?php echo form_close(); ?>
<p>&nbsp;</p>
<caption>Servicios Asignados</caption>
<div id="c_qry_serviciostipo" class="table-responsive">
    <?php 
    $opciones = null;
    $funciones = null;
    $nameTable = 'tabla-servicios-direccion';
    $pk = null;
    CrudGridMultipleJson($servicios_prestados,$nameTable,$pk,$opciones,$funciones); 
    ?>
</div>
