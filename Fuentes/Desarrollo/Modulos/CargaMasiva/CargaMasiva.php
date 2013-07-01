<?php
//require("../../config/parametros.php");

?>
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <title>Carga Masiva</title>
    <link href="../../css/dark-hive/jquery-ui-1.9.1.custom.css" rel="stylesheet">
    <link href="../../css/estilos.css" rel="stylesheet">
    <script src="../../js/jquery-1.8.2.js"></script>
    <script src="../../js/jquery-ui-1.9.1.custom.js"></script>
    <!-- JScrollable 
    <link rel="stylesheet" type="text/css" href="../../css/style.css" /> 
    <link rel="stylesheet" type="text/css" href="../../css/jquery.jscrollpane.codrops1.css" /> -->
    <!-- the mousewheel plugin 
    <script type="text/javascript" src="../../js/jquery.mousewheel.js"></script> -->
    <!-- the jScrollPane script 
    <script type="text/javascript" src="../../js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="../../js/scroll-startstop.events.jquery.js"></script> -->
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
    <!-- Upload Plugin 
    <script type="text/javascript" src="../../js/jQuery-File-Upload-8.3.2/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="../../js/jQuery-File-Upload-8.3.2/js/jquery.fileupload.js"></script> -->
    <!-- Load plupload and all it's runtimes and finally the jQuery UI queue widget --> 
    <style type="text/css">@import url(../../js/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css);</style>
    <script type="text/javascript" src="../../js/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="../../js/plupload/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
    <script type="text/javascript" src="../../js/plupload/js/i18n/es.js"></script>

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
           <!-- <h4>Carga Masiva</h4> -->
           <div>&nbsp;</div>
           <form id="FormRegUsu">
               <div id="uploader">
                 <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
               </div>
           </form>

           <!-- div id="dvUpload">
               <label for="upFile">Archivo: </label>
               <input type="file" id="upFile"/>
               <input type="button" value="Validar" id="btnValidar" />
           </div -->
           <div>&nbsp;</div>
            <input type="button" value="Validar" id="btnValidar" />
           <div>&nbsp;</div>
           <div id="dvResultados">
               <table id="tblResultados">
                    <thead>
                        <tr>
                            <th style="width: 10px;">Ver</th>
                            <th>Estado</th>
                            <th>N° Columna</th>
                            <th>Año</th>
                            <th>Nombre</th>
                            <th>Etapa</th>
                            <th>Cuenta</th>
                            <th>Unidad Tecnica</th>
                            <th>Id</th>
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
<div class="modal" style="text-align: center">
    <img src="../../css/ajax-loader.gif" />
</div>
<div id="confirmG">
    Se va a validar el archivo
</div>
</body>
</html>