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
            Email: <input type="text" name="email" id="email"><br>
            Password: <input type="password" name="cont" id="cont"><br>
            <input type="submit" name= "submit" value= "Log In">
        </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
    if(isset($_POST["submit"])){
        if(isset($_POST["email"])){
             $email= $_POST["email"];
        }
        if(isset($_POST["cont"])){
             $cont= $_POST["cont"];
        }
       
        $sqli= mysqli_connect($server, $user, $pass, $basededatos);
        if (!$sqli){
            die(mysqli_connect_error());
        }
        else{
            $depresion= "SELECT *
                        FROM Users
                        WHERE email='$email' AND pass='$cont';";
            $result= mysqli_query($sqli, $depresion);
            if (mysqli_num_rows($result)==1){
                $row= mysqli_fetch_array($result);
                echo "<script> alert('Bienvenido ".$row['nombreApellido']."');
                document.location.href='Layout.php?email=$email';
                </script>";
            }
            else{
                echo "<script> alert('No se quien eres');
                document.location.href='Login.php?';
                </script>";
            }
        }
    }
?>