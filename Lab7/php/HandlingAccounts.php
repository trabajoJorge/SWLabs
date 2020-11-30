<?php session_start(); 
    if (isset($_SESSION['email'])&& $_SESSION['admin']=='1') {
        include '../php/Menu.php';
        include 'DbConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
</head>
<body>
  <section class="main" style="height:100%;min-width:500px;" id="s1">
    <table style="width: 100%;" border=1>
    <tbody>
        <tr>
            <td style="width: 16.6667%;">EMAIL</td>
            <td style="width: 16.6667%;">PASS</td>
            <td style="width: 16.6667%;">IMAGEN</td>
            <td style="width: 16.6667%;">ESTADO<br></td>
            <td style="width: 16.6667%;">BLOQUEO</td>
            <td style="width: 16.6667%;">BORRAR</td>
        </tr>
        <tr>
            <?php  
                $mysqli= mysqli_connect($server, $user, $pass, $basededatos);
                if (!$mysqli){
                    echo "<font color=red;><h2> No hagas cosas raras <br>ERROR EN BD</h2></font>";
                } else{
                    $sql= "SELECT * FROM Users";
                    $result= mysqli_query($mysqli, $sql);
                    mysqli_close($mysqli);
                    if (!$result){
                        echo "<font color=red;><h3> No se como has llegado aquí pero no hay usuarios</h3></font>";
                    }else{
                        while( $row = mysqli_fetch_array( $result )){
                            if($row['IsAdmin']=='0'){
                                echo "  <tr><td style='width: 16.6667%;'>".$row['email']."</td>
                                        <td style='width: 16.6667%'>".$row['pass']."</td>
                                        <td><img style='max-width:120px; max-height:80px;' alt='Sin foto' src='data:image;base64,".$row['photo']."'/></td>
                                        <td style='width: 16.6667%;'>".$row['estado']."</td>
                                        <td style='width: 16.6667%;'><a href='ChangeUserState.php?email=".$row['email']."&estado=".$row['estado']."'><input type='button' value='CAMBIAR ESTADO'/></a></td>
                                        <td style='width: 16.6667%;'><a href='RemoveUser.php?email=".$row['email']."'><input type='button' value='ELIMINAR'/></a></td>";
                            }
                        }
                    }
                } 
                
            ?>
        </tr>
    </tbody>
</table>
</body>
</html>

<?php
    } else {
         echo "<script>
                alert('No me la lies');
                document.location.href='Login.php'
                </script> ";
    }
?>