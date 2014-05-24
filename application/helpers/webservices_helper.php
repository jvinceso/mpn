<?php 
function print_p($expression){
	print("<pre>".print_r($expression,true)."</pre>");
}

function creaCombo($query) {
    $array = toArrayNumerico($query);
    foreach ($array as $fila) {
        $data[utf8_encode($fila[0])] = mb_convert_encoding($fila[1], "UTF-8");
    }

    return $data;
}

// CONVIERTE UN ARRAY A NUMERICO (PSEUDO-EQUIVALENTE A mysql_fetch_row)
function toArrayNumerico($query) {
    $array = array();
    $fila = $col = 0;

    foreach ($query as $row) {
        $col = 0;
        foreach ($row as $key => $value) {
            $array[$fila][$col] = $value;
            $col++;
        }
        $fila++;
    }
    return $array;
}
function generaMeses(){
    return array(
        array("id"=> 1,"mes"=>"Enero"),
        array("id"=> 2,"mes"=>"Febrero"),
        array("id"=> 3,"mes"=>"Marzo"),
        array("id"=> 4,"mes"=>"Abril"),
        array("id"=> 5,"mes"=>"Mayo"),
        array("id"=> 6,"mes"=>"Junio"),
        array("id"=> 7,"mes"=>"Julio"),
        array("id"=> 8,"mes"=>"Agosto"),
        array("id"=> 9,"mes"=>"Septiembre"),
        array("id"=> 10,"mes"=>"Octubre"),
        array("id"=> 11,"mes"=>"Noviembre"),
        array("id"=> 12,"mes"=>"Diciembre") 
    );    
}

?>