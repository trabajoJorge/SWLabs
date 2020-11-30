<?php 
    echo "<div id='page-wrap'> <header class='main' id='h1'>";
    if ( isset($_SESSION['email'])) {
    
    
        if($_SESSION['foto']!=null) {
            $foto = "data:image;base64,".$_SESSION['foto'];
        } else {
            $foto = "../images/anonimus.png";
        }
        
        
        if($_SESSION['tipo']=='alumno') {
            echo "
                    <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
                    <span class='right'>Usuario: ".$_SESSION['email']."</span>
                    <span class='right'><a href='Logout.php?destroy'>Log Out</a></span>
                    <span class='right'><br>(Alumno)</br></span>
                </header>
                <nav class='main' id='n1' role='navigation'>
                    <span><a href='Layout.php'>Inicio</a></span>
                    <span><a href='HandlingQuizesAjax.php'>Gestionar preguntas</a></span>
                    <span><a href='Credits.php'>Creditos</a></span>
                </nav>";
        } else  {
            if ($_SESSION['tipo']=='profesor' && $_SESSION['admin']=='0' ){
            echo "
                    <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
                    <span class='right'>Usuario: ".$_SESSION['email']."</span>
                    <span class='right'><a href='Logout.php?destroy'>Log Out</a></span>
                    <span class='right'><br>(Profesor)</br></span>
                </header>
                <nav class='main' id='n1' role='navigation'>
                    <span><a href='Layout.php'>Inicio</a></span>
                    <span><a href='HandlingQuizesAjax.php'> Gestionar preguntas</a></span>
                    <span><a href='Credits.php'>Creditos</a></span>
                </nav>"; 
            } else {
                if ($_SESSION['tipo']=='profesor' && $_SESSION['admin']=='1' ) {
                echo "
                        <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
                        <span class='right'>Usuario: ".$_SESSION['email']."</span>
                        <span class='right'><a href='Logout.php?destroy'>Log Out</a></span>
                        <span class='right'><br>(Administrador)</br></span>
                    </header>
                    <nav class='main' id='n1' role='navigation'>
                        <span><a href='Layout.php'>Inicio</a></span>
                        <span><a href='HandlingAccounts.php'>Gestión de usuarios</a></span>
                        <span><a href='Credits.php'>Creditos</a></span>
                    </nav>"; 
                } 
                
            }
            
        }
    } else {
        $foto = "../images/anonimus.png";
        echo "
            <span class='right'><img style='max-width:120px; max-height:60px;' alt='imagen pregunta' src='".$foto."'/></span><br>
            <span class='right'><a href='Login.php'>Login</a></span> &nbsp;&nbsp;&nbsp;
            <span class='right'><a href='SignUp.php'>Registrarse</a></span>
            <span class='right'><br>(Usuario invitado)</br></span>
        </header>
        <nav class='main' id='n1' role='navigation'>
            <span><a href='Layout.php'>Inicio</a></span>
            <span><a href='Credits.php'>Creditos</a></span>
        </nav>"; 
        
    }

        
?>