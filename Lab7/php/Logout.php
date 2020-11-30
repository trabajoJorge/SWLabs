<?php
    session_start();
    if(isset($_GET['destroy'])){
        echo "<script>alert(\"¡Adiós ".$_SESSION['email'].";</script>"; 
        session_destroy();
        echo "<script>document.location.href='Layout.php';</script>"; 
    } else {
        echo "<script>alert('No tiene permisos para acceder.');document.location.href='Layout.php';</script>"; 
    }
?>