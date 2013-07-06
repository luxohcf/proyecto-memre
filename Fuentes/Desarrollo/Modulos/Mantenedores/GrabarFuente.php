<?php
require("../../config/parametros.php");
$depurar = 0; // Cambiar a 1 para ver el detalle
$data = array();
$aErrores = array();
$msg = "";

$idUsu = (isset($_POST['FormRegRecIDRec']))?$_POST['FormRegRecIDRec']:NULL;
$nmUsu = (isset($_POST['FormRegRecNomRec']))?$_POST['FormRegRecNomRec']:NULL;

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}
//$mySqli->query("SET CHARSET 'utf8'");

if(strlen($idUsu) > 0){ // Si no es nulo entonces valido el insert-update
	$querySelect = "SELECT 1 FROM TMM_FUENTE WHERE FUE_ID = $idUsu ";
	$res = $mySqli->query($querySelect);
	
	if($mySqli->affected_rows == 0) // Insert
	{
	    $mySqli->autocommit(FALSE);
	    
	    $mySqli->query("SET NAMES 'utf8'");
	    $mySqli->query("SET CHARACTER SET 'utf8'");
	    
	    $queryInsUsu = "INSERT INTO TMM_FUENTE (FUE_NOMBRE) VALUES ('$nmUsu')";
	
	    $res = $mySqli->query($queryInsUsu);
	    if($mySqli->affected_rows > 0)
	    {
	        $msg = "Se han guardado los cambios correctamente";
	        $mySqli->commit();
	        $mySqli->close();
	        $data["estado"] = "OK";
	    }
	    else {
	       $mySqli->rollback(); 
	       $mySqli->close();
	       $msg = "Error al insertar";
	       $data["estado"] = "KO";
	    }
	}
	else // Update 
	{
		
		$querySelect = "SELECT 1 FROM TMM_FUENTE WHERE FUE_NOMBRE = '$nmUsu'";
		$res = $mySqli->query($querySelect);
		
		if($mySqli->affected_rows == 0) // No existe el nombre
		{
		    $mySqli->autocommit(FALSE);
		    $mySqli->query("SET NAMES 'utf8'");
		    $mySqli->query("SET CHARACTER SET 'utf8'");

		    $queryUpdUsu = "UPDATE TMM_FUENTE SET
		                        FUE_NOMBRE  = '$nmUsu'
		                        WHERE FUE_ID = $idUsu";
		    
		    $res = $mySqli->query($queryUpdUsu);
		    
		    if($mySqli->errno == 0)
		    {
		        if($mySqli->affected_rows > 0)
		        {
		            $msg = "Se han guardado los cambios correctamente";
		            $mySqli->commit();
		            $mySqli->close();
		            $data["estado"] = "OK";
		        }
		        else {
		           $mySqli->rollback(); 
		           $mySqli->close();
		           $msg = "No se han realizado cambios";
		           $data["estado"] = "OK";
		        }
		    }
		    else {
		       $mySqli->rollback(); 
		       $mySqli->close();
		       $msg = "Error al modificar";
		       $data["estado"] = "KO";
		    }
		}
		else{
			$msg = "Ya existe la fuente $nmUsu";
			$data["estado"] = "KO";
		}
	}
}
else{ // Valido que no exista el nombre

	$querySelect = "SELECT 1 FROM TMM_FUENTE WHERE FUE_NOMBRE = '$nmUsu'";
	$res = $mySqli->query($querySelect);
	
	if($mySqli->affected_rows == 0) // Insert
	{
	    $mySqli->autocommit(FALSE);
	    
	    $mySqli->query("SET NAMES 'utf8'");
	    $mySqli->query("SET CHARACTER SET 'utf8'");
	    
	    $queryInsUsu = "INSERT INTO TMM_FUENTE (FUE_NOMBRE) VALUES ('$nmUsu')";
	
	    $res = $mySqli->query($queryInsUsu);
	    if($mySqli->affected_rows > 0)
	    {
	        $msg = "Se han guardado los cambios correctamente";
	        $mySqli->commit();
	        $mySqli->close();
	        $data["estado"] = "OK";
	    }
	    else {
	       $mySqli->rollback(); 
	       $mySqli->close();
	       $msg = "Error al insertar";
	       $data["estado"] = "KO";
	    }
	}
	else{
		$msg = "Ya existe la fuente $nmUsu";
		$data["estado"] = "KO";
	}
}

if($depurar == TRUE)
{
    $data["html"] = "$msg - $querySelect - $queryInsUsu - $queryUpdUsu ";
}
else 
{
    $data["html"] = "$msg";
}
echo json_encode($data);


?>