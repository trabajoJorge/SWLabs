<?php
    //Cargo las librerias que trabajan con WS
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $espacio_Nombres="http://localhost/nusoap-0.9.5/samples"; //Espacio de nombres que hay que poner por que si.
    $servidor = new soap_server; //Creo el objeto servidor.
    $servidor->configureWSDL('ValidarPasswordWS',$espacio_Nombres); //Configuro el XML con el que recibo y mando info
    $servidor->wsdl->schemaTargetNamespace=$espacio_Nombres; // IDK
    
    $servidor->register('comprobarPass', array('cont'=>'xsd:string','cod'=>'xsd:int'), array('z'=>'xsd:string'), $espacio_Nombres);
    
    function comprobarPass ($cont, $cod){
    	if ($cod==1010){
    	    	$pag = file_get_contents('../txt/toppasswords.txt');
    		if( strpos($pag, $cont) != false ) { //Str pos nos dice si el codigo esta en la pagina
    			return 'INVALIDA';
    		} else {
    			return 'VALIDA';
    		}
    	}
    	else return 'SIN SERVICIO';
    }
    if ( !isset( $HTTP_RAW_POST_DATA ) ) {
        $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    }
    $servidor->service($HTTP_RAW_POST_DATA);
    
?>