<?php session_start(); 
    if($_SESSION['admin']=='1') {
?>
<?php
    include 'DbConfig.php';
    $email = $_GET['email'];
    $estado = $_GET['estado'];
    
    if ($estado == 'Activo') $estado='Bloqueado';
    else $estado='Activo';
    
    $mysqli= mysqli_connect($server, $user, $pass, $basededatos);
    if (!$mysqli){
        echo "<font color=red;><h2> No hagas cosas raras <br>ERROR EN BD</h2></font>";
    } else{
        $sql= "UPDATE Users SET estado = '".$estado."' WHERE email='".$email."';";
        $result= mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
    } 
    header("location:HandlingAccounts.php");
?>
<?php
    } else {
         echo "<script>
                alert('No tienes permisos');
                document.location.href='Login.php'
                </script> ";
    }
?>