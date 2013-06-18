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
    <!-- DataTable plugin -->
    <script type="text/javascript" src="../../js/DT/jquery.dataTables.js"></script>
    <style type="text/css" title="currentStyle">
        @import "../../css/DT/demo_page.css";
        @import "../../css/DT/demo_table.css";
        @import "../../css/DT/demo_table_jui.css";
        @import "../../css/DT/jquery.dataTables_themeroller.css";
    </style>
    <!-- validate Plugin -->
    <script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../js/additional-methods.min.js"></script>
    <!-- Upload Plugin -->
    <script type="text/javascript" src="../../js/jQuery-File-Upload-8.3.2/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="../../js/jQuery-File-Upload-8.3.2/js/jquery.fileupload.js"></script>
    <!-- Funciones de la pagina -->
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <script type="text/javascript">
        
    // http://localhost:8080/proyecto-memre/Fuentes/Desarrollo/Modulos/CargaMasiva/CargaMasiva.php
    
    
    </script>
</head>
<body>
<div id="principal">
    <div id="menu">
        <div id="titulo">Proyecto MEMRE</div>
        <div id='botones'>
            <input type='button' id='btnLinkCM' value='Carga Masiva' />
            <input type='button' id='btnLinkMt' value='Mantenedores' />
        </div>
    </div>
    <div id="container">
        <div id="contenido">
           <h4>Carga Masiva</h4>
           <div id="dvUpload">
               <label for="upFile">Archivo: </label>
               <input type="file" id="upFile"/>
               <input type="button" value="Validar" id="btnValidar" />
           </div>
           <div>&nbsp;</div>
           <div id="dvResultados">
               <table id="tblResultados">
                    <thead>
                        <tr>
                            <th>Ver</th>
                            <th>Estado</th>
                            <th>N° Columna</th>
                            <th>xxx</th>
                            <th>xxx</th>
                            <th>xxx</th>
                            <th>xxx</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                </table>
           </div>
           <div>&nbsp;</div>
           <div id="dvBotonera">
               <input type="button" id="btnCargar" value="Cargar" />
               <input type="button" id="btnLimpiar" value="Limpiar" />
           </div>
        </div>
    </div>
    <div id="footer">
        Proyecto MEMRE V-1.0 - 2013
        Desarrollado por Luis Lizama  
    </div>
</div>
<div id="dvMensajes" style="display: none" >
    <div id="dMsg">
    </div>
</div>
<div id="progress">
    <div class="bar" style="width: 0%;"></div>
</div>
</body>
</html>