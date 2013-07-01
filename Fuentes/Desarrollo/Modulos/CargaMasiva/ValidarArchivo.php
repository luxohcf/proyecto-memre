<?php
//error_reporting(E_ALL ^ E_NOTICE);
require("../../config/parametros.php");
require_once("../../config/excel_reader2.php");
//http://localhost:8080/proyecto-memre/Fuentes/Desarrollo/Modulos/CargaMasiva/ValidarArchivo.php
$depurar = 0; // Cambiar a 1 para ver el detalle
$targetDir = $DIR_EXCEL;
$data = array();
$msg = "";


if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
    while (($file = readdir($dir)) !== false) {
        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
        if (preg_match('/\.xls/', $file)){
            $data[] = $tmpfilePath;    
        }
    }
    closedir($dir);
}

if(isset($data[0]))
{
    $excel = new Spreadsheet_Excel_Reader($data[0]);
    if(validarExcel($excel, $COLUMNAS, $msg)){
            
            // borro los temp
            $mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
            $delete = "DELETE FROM TMM_TEMPORAL";
            $res = $mySqli->query($delete);

            $filas = $excel->rowcount();
            $columnas = $excel->colcount();
            
            for($x = 2; $x < $filas +1; $x++){ // por cada fila, parto de la 2
                //for($y = 1; $y < $columnas + 1; $y++){ // por cada columna de la fila x
                $errores = null;
                $errores = array();
                $mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
                //$mySqli->autocommit(FALSE);
                $insert = "INSERT INTO TMM_TEMPORAL (TEM_FUENTE,
                                                     TEM_BIP,
                                                     TEM_ETAPA,
                                                     TEM_CUENTA,
                                                     TEM_NOMBRE,
                                                     TEM_ENERO,
                                                     TEM_FEBRERO,
                                                     TEM_MARZO,
                                                     TEM_ABRIL,
                                                     TEM_MAYO,
                                                     TEM_JUNIO,
                                                     TEM_JULIO,
                                                     TEM_AGOSTO,
                                                     TEM_SEPTIEMBRE,
                                                     TEM_OCTUBRE,
                                                     TEM_NOVIEMBRE,
                                                     TEM_DICIEMBRE,
                                                     TEM_UNI_TEC,
                                                     TEM_ANNO,
                                                     TEM_NUMERO_COLUMNA,
                                                     TEM_ERRORES) VALUES (";
                
                $temp = $excel->value($x, 1); //   FUENTE – Caracteres, longitud máxima 4
                
                if (!(is_string($temp) && strlen($temp) < 5 ) ){
                    $errores[] = $COLUMNAS_MSJ[0];
                    $insert .= "'',";
                }
                else {
                    $insert .= "'$temp',";
                }
                
                $temp = $excel->value($x, 2); //   BIP – Numérico, mayor a 0 sin decimales, longitud máxima    10
                
                if (!(is_int($temp) && strlen($temp) < 11 && intval($temp) > 0) ){
                    $errores[] = $COLUMNAS_MSJ[1];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 3); //   ETAPA – Caracteres, longitud máxima 255
                
                if (!(is_string($temp) && strlen($temp) < 256 ) ){
                    $errores[] = $COLUMNAS_MSJ[2];
                    $insert .= "'',";
                }
                else {
                    $insert .= "'".$temp."',";
                }
                
                $temp = $excel->value($x, 4); //   CUENTA  – Numérico, mayor a 0 sin decimales, longitud máxima    10
                
                if (!(is_int($temp) && strlen($temp) < 11 && $temp > 0) ){
                    $errores[] = $COLUMNAS_MSJ[3];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 5); //   NOMBRE – Caracteres, longitud máxima 255
                
                if (!(is_string($temp) && strlen($temp) < 256 && strlen($temp) > 0) ){
                    $errores[] = $COLUMNAS_MSJ[4];
                    $insert .= "'',";
                }
                else {
                    $insert .= "'$temp',";
                }
                
                $temp = $excel->value($x, 6); //   ENERO – Numérico, mayor a 0 sin decimales, longitud máxima  10
                //$insert .= "$temp,";
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[5];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 7); //   FEBRERO – Numérico, mayor a 0 sin decimales, longitud máxima    10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[6];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 8); //   MARZO – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[7];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 9); //   ABRIL – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[8];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 10); //   MAYO – Numérico, mayor a 0 sin decimales, longitud máxima   10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[9];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 11); //   JUNIO – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[10];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 12); //   JULIO – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[11];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 13); //   AGOSTO – Numérico, mayor a 0 sin decimales, longitud máxima     10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[12];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 14); //   SEPTIEMBRE – Numérico, mayor a 0 sin decimales, longitud máxima     10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[13];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 15); //   OCTUBRE – Numérico, mayor a 0 sin decimales, longitud máxima    10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[14];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 16); //   NOVIEMBRE – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[15];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 17); //   DICIEMBRE – Numérico, mayor a 0 sin decimales, longitud máxima  10
                
                if (!(is_int(intval($temp)) && strlen($temp) < 11 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[16];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                $temp = $excel->value($x, 18); //   UNIDAD TECNICA – Caracteres, longitud máxima 255
                
                if (!(is_string($temp) && strlen($temp) < 256 ) ){
                    $errores[] = $COLUMNAS_MSJ[17];
                    $insert .= "'',";
                }
                 else {
                    $insert .= "'$temp',";
                }
                
                $temp = $excel->value($x, 19); // ANNIO - Numérico, mayor a 0 sin decimales, longitud máxima  4
                
                if (!(is_int(intval($temp)) && strlen($temp) < 5 && intval($temp) > -1 ) ){
                    $errores[] = $COLUMNAS_MSJ[18];
                    $insert .= "null,";
                }
                else {
                    $insert .= "$temp,";
                }
                
                // Insertar el registros
                $insert .= "$x,";
                $insert .= "'". implode("</br>", $errores) . "')";
                
                if($mySqli->connect_errno)
                {
                    $data["Error conexion MySql"] = $mySqli->connect_error;
                }
                $msg .= " - $insert - ";
                $res = $mySqli->query($insert);
            }
            // al final borrar el archivo
            //@unlink($data[0]);
    }
    else{
        @unlink($data[0]);
    }
}
else{
    $msg = "No hay archivo para validar";
}


if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect";
}
else 
{
    $data["html"] = $msg;
}
echo json_encode($data);
/*
echo "<span>";
echo var_dump($data);
echo "</span>";*/

?>