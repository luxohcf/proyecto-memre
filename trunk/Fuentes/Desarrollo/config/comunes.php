<?php
function generar_clave($longitud){ 
       $cadena="[^A-Z0-9]"; 
       return substr(preg_replace($cadena, "", md5(rand())) . 
       preg_replace($cadena, "", md5(rand())) . 
       preg_replace($cadena, "", md5(rand())), 
       0, $longitud); 
} 

function validarExcel($excel, $columnas, &$errores){

    $flag = true;
    // 18 columas
    $contCols = count($columnas);
    $cont = $excel->colcount();
    if($cont != $contCols){
        $errores = $errores."</br>El archivo no contiene la cantidad estandar de $contCols columnas, si no que tiene $cont";
        $flag = false;
    }
    else{ // al menos 2 filas
        $cont = $excel->rowcount();
        if($cont < 2){
            $errores = $errores."</br>El archivo no contiene datos ha validar";
            $flag = false;
        }
        else {
            for($x = 1; $x < $contCols +1; $x++){
                if($excel->val(1,$x) != $columnas[$x -1]){
                  $errores = $errores."</br>La columna $x deberia ser ".$columnas[$x -1] . " en vez de ".$excel->val(1,$x);
                  $flag = false;
                }
            }
        }
    }
    return $flag;
}

function validarTipoDato($dato,$tipo,$longitud){
    
    // Pendiente
    
    return true;
}
?>