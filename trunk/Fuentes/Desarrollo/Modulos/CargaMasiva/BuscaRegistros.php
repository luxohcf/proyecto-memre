<?php
require("../../config/parametros.php");

$depurar = 0; // Cambiar a 1 para ver el detalle
$aaData = array();

$query = "SELECT `HIS_ID`, `TEM_MONTO`, `TEM_NOMBRE`, `TEM_ANNO`, `TEM_BIP`, `TEM_FUENTE`, `TEM_ETAPA`, `TEM_CUENTA`, `TEM_ENERO`, `TEM_FEBRERO`, `TEM_MARZO`, `TEM_ABRIL`, `TEM_MAYO`, `TEM_JUNIO`, `TEM_JULIO`, `TEM_AGOSTO`, `TEM_SEPTIEMBRE`, `TEM_OCTUBRE`, `TEM_NOVIEMBRE`, `TEM_DICIEMBRE`, `TEM_UNI_TEC`, `TEM_NUMERO_COLUMNA` FROM `tmm_temporal`";


$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

if($mySqli->connect_errno)
{
    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
}
$res = $mySqli->query($query);

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
        $aaData[] = array(                  
                            "xx",
                            "xx",
                            "xx",
                            "xx",
                            "xx",
                            "xx",
                            "xx"
                        );
     }
  
}

$aa = array(
     'sEcho' => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        'aaData' => $aaData);

if($depurar) // Detalle http://localhost:8080/proyecto-memre/Fuentes/Desarrollo/Modulos/CargaMasiva/BuscaRegistros.php
{
    echo "<span>";
    echo var_dump($_POST);
    echo "</span>";
    echo "<span>";
    echo var_dump($Info_usuario);
    echo "</span>";
    echo "<span>";
    echo var_dump($aErrores);
    echo "</span>";
    echo "<span>";
    echo var_dump($aa);
    echo "</span>";
   die;
}
        
echo json_encode($aa);

?>