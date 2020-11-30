<?php
    session_start();
    if ( isset($_SESSION["email"])){
        # usuario ya esta logueado
        echo "<script> alert('Ya estas logueado, ".$_SESSION['nombreApellido']." ');
               document.location.href='Layout.php';
               </script>";
    } else {
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
    <?php include '../php/DbConfig.php'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>

</head>
<body>
  <?php include '../php/Menu.php' ?>
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
        # usuario no logueado
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
                            WHERE email='$email' AND pass= sha1('$cont');";
                $result= mysqli_query($sqli, $depresion);
                if (mysqli_num_rows($result)==1){
                    $row= mysqli_fetch_array($result);
                    session_start();
                    $_SESSION['email']= $row['email'];
                    $_SESSION['nombreApellido']= $row['nombreApellido'];
                    $_SESSION['foto']= $row['photo'];
                    $_SESSION['tipo']= $row['type'];
                    $_SESSION['admin']= $row['IsAdmin'];
                    echo "<script> alert('Bienvenido ".$row['nombreApellido']."');
                    document.location.href='Layout.php';
                    </script>";
                }
                else{
                    echo "<script> alert('No se quien eres');
                    document.location.href='Login.php';
                    </script>";
                }
            }
        }
    }
?>