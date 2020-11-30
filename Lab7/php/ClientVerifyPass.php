<?php
    require_once('../lib/nusoap.php'); 
    require_once('../lib/class.wsdlcache.php');
    
    if (isset($_GET["pass"])){
        $pass=$_GET["pass"];
        $soapClient= new nusoap_client('https://swweb.000webhostapp.com/Lab6/php/VerifyPassWS.php?wsdl',true);
        $resultado= $soapClient->call("comprobarPass", array('cont'=>$pass, 'cod'=>1010));
        if ( $resultado == "INVALIDA" ){
            echo "<p style='color:red;'>Contraseña invalida.</p>";
        } else if ( $resultado == "VALIDA" ){
            echo "<p style='color:green;'>Contraseña valida.</p>"; 
        }else {
            echo "<p style='color:blue;'>Todo mal.</p>";
        }
    }
?>