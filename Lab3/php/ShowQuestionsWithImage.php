<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html';
        include 'DbConfig.php';?>
</head>
<body>
    <?php
    if(isset($_GET['email'])){
        include "MenuRegistrados.php";
    } else {
        include "Menus.php";
    }
  ?>
  <section class="main" id="s1">
    <div>
      <?php $mysqli= mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli){
            echo "<font color=red;><h2> No hagas cosas raras Jose Angel <br> No se ha introducido la pregunta vas a ser redirigido </h2></font>";
        }
        else{
            $sql= "SELECT * FROM `Preguntas`";
            //echo $sql;
            $result= mysqli_query($mysqli, $sql);
            mysqli_close($mysqli);
            if (!$result){
                echo "<font color=red;><h3> No hay preguntas Jose Angel</h3></font>";
            }
            else{
                echo "<table border=1>";
                echo "    <tr><th><b>email</b></th><th><b>pregunta</b></th><th><b>respuesta correcta</b></th><th><b>imagen</b></th></tr>";
                while( $row = mysqli_fetch_array( $result)){
                        echo "    <tr><td>".$row['email']."</td><td>".$row['pregunta']."</td><td>".$row['C']."</td><td>
                        <img src='data:image;base64,".$row['Imagen']."'style= 'max-width: 200px; max-height: 200px'/></td></tr>";
                }
                    echo "</table>";
            }
        }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
