<?php
    require_once('../lib/nusoap.php'); 
    require_once('../lib/class.wsdlcache.php');
    
    if (isset($_GET["email"])){
        $email=$_GET["email"];
        $soapClient= new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
        $resultado= $soapClient->call("comprobar", array('x'=>$email));
        if ( $resultado == "NO" ){
            echo "<p style='color:red;'>Usuario no es VIP.</p>";
        } else {
            echo "<p style='color:green;'>Usuario es VIP.</p>";
        }
    }
?>