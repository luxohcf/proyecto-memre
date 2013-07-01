/* Funciones index.html */
$(function() {

		$( "#btnLinkCM" ).button();
		$( "#btnLinkMt" ).button();
		$( "#btnValidar" ).button();
		
		$( "#btnCargar" ).button();
		$( "#btnLimpiar" ).button();
		
		$( "#btnLinkMt" ).click(function(){
			document.location.href = "../Mantenedores/Mantenedores.php";
		});
		
		var up = $("#uploader").plupload({
	        // General settings ../../js/plupload/examples/upload.php
	        runtimes : 'html5',
	        url : '../CargaMasiva/upload.php',
	        max_file_size : '4mb',
	        chunk_size : '1mb',
	        unique_names : true,
	        multi_selection: false,
	        max_file_count:1,
	        multiple_queues : false,
	        // Specify what files to browse for
	        filters : [
	            {title : "Excel files", extensions : "xls,xlsx"}
	        ]
	    });
		
		$('#btnValidar').click(function(e) {
			$('#confirmG').dialog( "open" );
	    });

		var oTabla = $('#tblResultados').dataTable({   
         bJQueryUI: true,
         sPaginationType: "full_numbers", //tipo de paginacion
         "bFilter": true, // muestra el cuadro de busqueda
         "iDisplayLength": 4, // cantidad de filas que muestra
         "bLengthChange": false, // cuadro que deja cambiar la cantidad de filas
         "oLanguage": { // mensajes y el idio,a
	            "sLengthMenu": "Mostrar _MENU_ registros",
	            "sZeroRecords": "No hay resultados",
	            "sInfo": "Resultados del _START_ al _END_ de _TOTAL_ registros",
	            "sInfoEmpty": "0 Resultados",
	            "sInfoFiltered": "(filtrado desde _MAX_ registros)",
	            "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    }
	        },
	     "bProcessing": true, //para procesar desde servidor
	     "sServerMethod": "POST",
	     "sAjaxSource": './BuscaRegistros.php', // fuente del json
	     "fnServerData": function ( sSource, aoData, fnCallback ) { // Para buscar con el boton
            $.ajax( {
                "dataType": 'json', 
                "type": "POST", 
                "url": sSource, 
                "data": $('#FormRegUsu').serialize(), 
                "success": fnCallback
            	} );
           }
	  });
	  
	  $('#confirmG' ).dialog({
			autoOpen: false,
			width: 300,
			height: 260,
			modal: true,
			resizable: false,
			buttons : {
		        "Confirmar" : function() {
		           
		           $.post("./ValidarArchivo.php",// $('#FormRegUsu').serialize(),
						   function(data) {
						   	var obj = jQuery.parseJSON(data);

					   		$('#dMsg').html( obj.html );
					   		$('#dvMensajes').dialog( "open" );
					   		
					   		oTabla.fnReloadAjax();
				   });
	
				   $(this).dialog("close");
		        },
		        "Cancelar" : function() {
		          $(this).dialog("close");
	        	}}
		});
		
	  // Hide the second column after initialisation
	  oTabla.fnSetColumnVis( 8, false );
	  //oTabla.fnSetColumnVis( 7, false );
	

		$("body").on({
		    ajaxStart: function() { 
		        $(this).addClass("loading"); 
		    },
		    ajaxStop: function() { 
		        $(this).removeClass("loading"); 
		    }    
		});
		$( "#dvMensajes" ).dialog({
			autoOpen: false,
			width: 700,
			height: 500,
			modal: true,
			resizable: false
		});
		
	});
	$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
	{
	    if ( typeof sNewSource != 'undefined' && sNewSource != null ) {
	        oSettings.sAjaxSource = sNewSource;
	    }
	 
	    // Server-side processing should just call fnDraw
	    if ( oSettings.oFeatures.bServerSide ) {
	        this.fnDraw();
	        return;
	    }
	 
	    this.oApi._fnProcessingDisplay( oSettings, true );
	    var that = this;
	    var iStart = oSettings._iDisplayStart;
	    var aData = [];
	  
	    this.oApi._fnServerParams( oSettings, aData );
	      
	    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
	        /* Clear the old information from the table */
	        that.oApi._fnClearTable( oSettings );
	          
	        /* Got the data - add it to the table */
	        var aData =  (oSettings.sAjaxDataProp !== "") ?
	            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
	          
	        for ( var i=0 ; i<aData.length ; i++ )
	        {
	            that.oApi._fnAddData( oSettings, aData[i] );
	        }
	          
	        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
	          
	        if ( typeof bStandingRedraw != 'undefined' && bStandingRedraw === true )
	        {
	            oSettings._iDisplayStart = iStart;
	            that.fnDraw( false );
	        }
	        else
	        {
	            that.fnDraw();
	        }
	          
	        that.oApi._fnProcessingDisplay( oSettings, false );
	          
	        /* Callback user function - for event handlers etc */
	        if ( typeof fnCallback == 'function' && fnCallback != null )
	        {
	            fnCallback( oSettings );
	        }
	    }, oSettings );
	};
	
	function verDetalle(id){
		$.post("./BuscarDetalle.php", {ID : id},
		   function(data) {
		   	var obj = jQuery.parseJSON(data);
	   		$('#dMsg').html( obj.html );
	   		$('#dvMensajes').dialog( "open" );
		 });
	}
	
	function verError(id){
		$.post("./BuscarErrores.php", {ID : id},
		   function(data) {
		   	var obj = jQuery.parseJSON(data);
	   		$('#dMsg').html( obj.html );
	   		$('#dvMensajes').dialog( "open" );
		 });
	}
	
