$(function() {
		
		$( "#menuUl" ).menu();
		$( "#bOut" ).button();
		$( "#bHome" ).button();
		$( "#bMDatos" ).button();

		/* Dialogo de mensajes */
		$( "#FormIniSesErr" ).dialog({
			autoOpen: false,
			width: 300,
			height: 260,
			modal: true,
			resizable: true
		});

        /* Boton para cerrar sesion */
        $( "#bOut" ).button().click( function() {
            window.location.href = "IniSes/logout.php";
        });
        
        /* Boton para abrir el main */
        $( "#bMDatos" ).button().click( function() {
            window.location.href = "main.php";
        });
        
        /* Boton para abrir el index */
        $( "#bHome" ).button().click( function() {
            window.location.href = "index.php";
        });
        
	});

	function cambiarContenido(item)
	{
		document.getElementById('P').style.display='none';
		document.getElementById('S').style.display='none';
		document.getElementById('A').style.display='none';
		document.getElementById('C').style.display='none';
		document.getElementById('F').style.display='none';
		document.getElementById('E').style.display='none';
		document.getElementById('D').style.display='none';
		document.getElementById('T').style.display='none';
		document.getElementById(item).style.display='block';
	};

	/* Funcion plug-in */
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