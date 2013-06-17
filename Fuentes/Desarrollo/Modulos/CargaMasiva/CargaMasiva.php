<?php
require("../../config/parametros.php");

?>
<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <title>Carga Masiva</title>
    <link href="../../css/dark-hive/jquery-ui-1.9.1.custom.css" rel="stylesheet">
    <link href="../../css/estilos.css" rel="stylesheet">
    <script src="../../js/jquery-1.8.2.js"></script>
    <script src="../../js/jquery-ui-1.9.1.custom.js"></script>
    <!-- JScrollable -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css" /> 
    <link rel="stylesheet" type="text/css" href="../../css/jquery.jscrollpane.codrops1.css" />
    <!-- the mousewheel plugin -->
    <script type="text/javascript" src="../../js/jquery.mousewheel.js"></script>
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="../../js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="../../js/scroll-startstop.events.jquery.js"></script>
    <!-- validate Plugin -->
    <script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../js/additional-methods.min.js"></script>
    <!-- Funciones de la pagina -->
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <script type="text/javascript">
        
        
    </script>
</head>
<body>
    <div id="contenido">
       <h4>Carga Masiva</h4>
       <div id="dvUpload">
           <label for="upFile">Archivo: </label>
           <input type="file" id="upFile"/>
           <input type="button" value="Validar" id="btnValidar" />
       </div>
       <div id="dvResultados">
           <table id="tblResultados">
                <thead>
                    <tr>
                        <th>Ver</th>
                        <th>Estado</th>
                        <th>N° Columna</th>
                        <th>xxx</th>
                        <th>xxx</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
       </div>
       <div id="dvBotonera">
           <input type="button" id="btnCargar" value="Cargar" />
           <input type="button" id="btnLimpiar" value="Limpiar" />
       </div>
    </div>
<div id="dvMensajes" >
    <div id="dMsg">
    </div>
</div>
</body>
</html>