<?php
$atributosForm = array('id' => 'frm_reg_direccion_par', 'name' => 'frm_reg_direccion_par');
$txt_direccion = form_textarea(array('name' => 'txt_valor_direccion', 'id' => 'txt_valor_direccion', 'type' => 'text', 'required' => 'required', 'class' => 'input-medium', 'maxlength' => '200', 'style' => 'margin-bottom:9px;resize:none;width:100%;',"rows"=>"2"));
$btn_asignar_direccion = form_submit('btn_asignar_direccion', 'Registrar Dirección', 'id="btn_asignar_direccion" class="btn" pid ="' . 'sxyz' . '"');
?>
 
<!-- <script type="text/javascript" src="<?php echo URL_JS ?>sigma/nuevo_tramite/jsDireccionPersona.js"></script> -->
<center>
    <img src="<?php echo URL_IMG; ?>icons/essen/16/business-contact.png" alt="">&nbsp;<b><?php echo strtoupper($persona['apellido'] . ", " . $persona['nombre']); ?></b>
    <br/><br/>
        <?php echo form_open('', $atributosForm); ?>

        <table class="table-horizontal">
            <tbody>
                <tr>
                    <td class="valign_top_label"><label>Calle:</label></td>
                    <td class="valign_top_control"><?php echo $calles; ?></td>
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

<div id="c_qry_direccion_participantes"></div>
