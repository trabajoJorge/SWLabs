<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
    <?php include '../php/DbConfig.php'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <form id="fquestion" name="fquestion" action="" method= "post" enctype="multipart/form-data">
            Nombre y Apellido: <input type="text" name="NA" id="NA"><br>
            Email: <input type="text" name="email" id="email"><br>
            Password: <input type="password" name="cont" id="cont"><br>
            Repetir password: <input type="password" name="cont1" id="cont1"><br>
            <input type="radio" id="alumno" name="tipo" value="alumno">
                        <label for="alumno">Alumno</label> 
                        <input type="radio" id="profesor" name="tipo" value="profesor">
                        <label for="profesor">Profesor</label><br>
             Foto perfil: <br><input type="file" name="foto" id="foto" onChange="verImg(event)" acept "image/*" ><br>  
            <img src="" id="pegar" name="pegar" style= "max-width: 200px; max-height: 200px"><br><br>  
            <input type="submit" value="Sign Up" name="submit" id="submit"/>
        </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
    if(isset($_POST["submit"])){
        if(isset($_POST["NA"])){
             $NA= $_POST["NA"];
        }
        if(isset($_POST["email"])){
             $email= $_POST["email"];
        }
        if(isset($_POST["cont"])){
             $cont= $_POST["cont"];
        }
        if(isset($_POST["cont1"])){
             $cont1= $_POST["cont1"];
        }
        if(isset($_POST["tipo"])){
             $tipo= $_POST["tipo"];
        }
       if($_FILES!=null && $_POST!=null){
            $file = $_FILES["foto"]["tmp_name"];   
            if(!isset($file)){
                echo "Sube una imagen, por favor";
            }else{
                $imput = file_get_contents(addslashes($_FILES['foto']['tmp_name']));
                $tam = getimagesize($_FILES['foto']['tmp_name']);
                if($tam==FALSE){
                    echo "La imagen no se ha seleccionado.";
                } else {
                   $img = base64_encode($imput);
                }
            }
        }
       if ($cont1!=$cont || strlen($cont)<6){
           echo "<script> alert('Alguna contraseña no es correcta');
                document.location.href='SignUp.php?';
                </script>";
       }
       else if (empty($tipo) || empty($NA) || empty($email)) {
            echo "<script> alert('Algun dato es vacio');
                document.location.href='SignUp.php?';
                </script>";
       }
       else{
            $sqli= mysqli_connect($server, $user, $pass, $basededatos);
            if (!$sqli){
                die(mysqli_connect_error());
            }
            
            else{
                $depresion= "SELECT *
                            FROM Users
                            WHERE email='$email';";
                $result= mysqli_query($sqli, $depresion);
                if (mysqli_num_rows($result)>0){
                    $row= mysqli_fetch_array($result);
                    echo "<script> alert('".$row['nombreApellido'].", ya estas registrado');
                    document.location.href='Layout.php?';
                    </script>";
                }
                else{
                    $apatia= "INSERT INTO `Users` (`email`, `type`, `nombreApellido`, `pass`, `photo`) VALUES ('$email', '$tipo', '$NA', '$cont', '$img');";
                    echo $apatia;
                    $result= mysqli_query($sqli, $apatia);
                    echo "<script> alert('Bienvenido, ".$NA."');
                    document.location.href='Login.php';
                    </script>";
                }
            }
       }
    }
?>