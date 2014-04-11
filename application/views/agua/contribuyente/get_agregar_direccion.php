<?php
$atributosForm = array('id' => 'frm_reg_direccion_par', 'name' => 'frm_reg_direccion_par');
$txt_hdn_persona = form_hidden(array('txt_hdn_nPerid'=> $persona['nPerId'] , 'txt_hdn_nMulId' => $persona['nMulId'] ));
$txt_calle = form_input(array('name' => 'txt_ins_calle', 'id' => 'txt_ins_calle', 'required' => 'required', 'class' => 'input-medium input-square','maxlength' => '25'));
$txt_direccion = form_textarea(array('name' => 'txt_valor_direccion', 'id' => 'txt_valor_direccion', 'type' => 'text', 'required' => 'required', 'class' => 'input-medium', 'maxlength' => '200', 'style' => 'margin-bottom:9px;resize:none;width:100%;',"rows"=>"2"));
$btn_asignar_direccion = form_submit('btn_asignar_direccion', 'Registrar Dirección', 'id="btn_asignar_direccion" data-loading-text="Registrando..."  class="btn btn-purple btn-sm"');
$cbo_sectores = form_dropdown("cbo_sector", creaCombo($sector),'', 'id="cbo_sector" class="chosen-select w360"');
$cbo_calle = form_dropdown("cbo_calle", creaCombo(array(0=>array('nCalId'=>0,'cCalNombre' => 'Seleccione un Sector'))),'', 'id="cbo_calle" class="chosen-select w360"');
echo $txt_hdn_persona;
?>
<script type="text/javascript" src="<?php echo URL_JS ?>sistema/agua/contribuyente/contribuyente_direccion_ins.js"></script>
<center>
    <img src="<?php echo URL_IMG; ?>essen/16/business-contact.png" alt="">&nbsp;<b><?php echo strtoupper($persona['apellido'] . ", " . $persona['nombre']); ?></b>
    <br/><br/>
        <?php echo form_open('', $atributosForm); ?>

        <table class="table-horizontal">
            <tbody>
                <tr>
                    <td class="valign_top_label"><label>Sector:</label></td>
                    <td class="valign_top_control">
                        <?php
                            echo $cbo_sectores;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="valign_top_label"><label>Calle:</label></td>
                    <td class="valign_top_control">
                        <div id="c_cbo_calles">
                            <?php echo $cbo_calle; ?>                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="valign_top_label"><label>Dirección</label></td>
                    <td><?php echo $txt_direccion; ?></td>
                </tr>
            </tbody>
        </table>
        <center>
            <?php echo $btn_asignar_direccion; ?> 
            <span id="preload_reg_direccion_per"></span>
        </center>
</center>
<?php echo form_close(); ?>
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
