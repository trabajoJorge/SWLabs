<?php 

$email = $_GET['email'];
echo "<div id='page-wrap'> <header class='main' id='h1'>";

            #Abro la conexión
            include "DbConfig.php";
            $mysqli = mysqli_connect ($server, $user, $pass, $basededatos);
            if (!$mysqli) {
                die("<center><br/><br/><h2> Ha habido un problema con la conexión a la base de datos!</h2><br/><br/><img src='../images/not.png' style='max-width:200px;'><br/><br/><br/>Detalle del error: ".mysqli_connect_error()."</center>");
            } else {
               $sql = "SELECT * FROM Users WHERE email='$email';";
                $resultado = mysqli_query ($mysqli,$sql);
               
               
                #Recupero al foto de ese email
                $row = mysqli_fetch_array( $resultado );
                if($row['photo']!=null) {
                    $foto = "data:image;base64,".$row['photo'];
                } else {
                    $foto = "../images/anonimus.png";
                }
                if($row['type']=='alumno') {
                    
               echo "
                    <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
                    <span class='right'>Usuario: $email</span>
                    <span class='right'><a href='Logout.php?email=$email'>Log Out</a></span>
                    <span class='right'><br>(".$row['type'].")</br></span>
                </header>
                <nav class='main' id='n1' role='navigation'>
                    <span><a href='Layout.php?email=$email'>Inicio</a></span>
                    <span><a href='Credits.php?email=$email'>Creditos</a></span>
                    
                </nav>";
                }
                else {
                    echo "
                    <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
                    <span class='right'>Usuario: $email</span>
                    <span class='right'><a href='Logout.php?email=$email'>Log Out</a></span>
                    <span class='right'><br>(".$row['type'].")</br></span>
                </header>
                <nav class='main' id='n1' role='navigation'>
                    <span><a href='Layout.php?email=$email'>Inicio</a></span>
                    <span><a href='HandlingQuizesAjax.php?email=$email'> Gestionar preguntas</a></span>
                    <span><a href='Credits.php?email=$email'>Creditos</a></span>
                </nav>"; 
                }
               
                #Cierro la conexión
                mysqli_close($mysqli);
            }

    
?>