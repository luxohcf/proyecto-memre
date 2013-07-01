<?php
require("../../config/parametros.php");

$data = array();
$msg = "";

$msg = $_POST['ID'];

$ID = (isset($_POST['ID']))?$_POST['ID']:NULL;

$query = "SELECT `HIS_ID`, `TEM_MONTO`, `TEM_NOMBRE`, `TEM_ANNO`, `TEM_BIP`, 
                 `TEM_FUENTE`, `TEM_ETAPA`, `TEM_CUENTA`, `TEM_ENERO`, `TEM_FEBRERO`, 
                 `TEM_MARZO`, `TEM_ABRIL`, `TEM_MAYO`, `TEM_JUNIO`, `TEM_JULIO`, `TEM_AGOSTO`, 
                 `TEM_SEPTIEMBRE`, `TEM_OCTUBRE`, `TEM_NOVIEMBRE`, `TEM_DICIEMBRE`, `TEM_UNI_TEC`, 
                 `TEM_NUMERO_COLUMNA`, `TEM_ANNO`, `TEM_ERRORES` FROM `tmm_temporal` where HIS_ID = $ID";


$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

if($mySqli->connect_errno)
{
    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
}
$mySqli->query("SET CHARSET 'utf8'");
$res = $mySqli->query($query);

if($mySqli->affected_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
        $data[] = array();
    }
}

if($depurar == TRUE)
{
    $data["html"] = "$msg";
}
else 
{
    $data["html"] = $msg;
}
echo json_encode($data);
?>