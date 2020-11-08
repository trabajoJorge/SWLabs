<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html';
          include 'DbConfig.php';
    ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <?php
        if (isset($_POST["email"])){
            $email= $_POST["email"];
        }
        if (isset($_POST["preg"])){
            $preg= $_POST["preg"];
        }
        if (isset($_POST["C"])){
            $C= $_POST["C"];
        }
        if (isset($_POST["I1"])){
            $I1= $_POST["I1"];
        }
         if (isset($_POST["I2"])){
            $I2= $_POST["I2"];
        }
         if (isset($_POST["I3"])){
            $I3= $_POST["I3"];
        }
         if (isset($_POST["complejidad"])){
            $complejidad= $_POST["complejidad"];
        }
        if (isset($_POST["tema"])){
            $tema= $_POST["tema"];
        }
        
        if($_FILES!=null && $_POST!=null){
            $file = $_FILES["foto"]["tmp_name"];   
        
            if(!isset($file)){
                echo "Sube una imagen, por favor";
            }else{
                $imput = file_get_contents(addslashes($_FILES['foto']['tmp_name']));
                $tam = getimagesize($_FILES['foto']['tmp_name']);
                $img= '';
                if($tam!=FALSE){
                   $img = base64_encode($imput);
                }
            }
        }else{
             $img= null;
        }
        
        $regex_mail_prof1 = "/^[a-zA-Z]+(\.?[a-zA-Z]+)?\@ehu\.eus$/";
        $regex_mail_prof2 = "/^[a-zA-Z]+(\.?[a-zA-Z]+)?\@ehu\.es$/";
        $regex_mail_estd1 = "/^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.eus$/";
        $regex_mail_estd2 = "/^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es$/";

        if(strlen($email) < 1) {
            echo "<script language=\"javascript\">alert(\"La dirección e-mail es obligatoria\");document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
        } else {
            if(preg_match($regex_mail_prof1, $email) || preg_match($regex_mail_prof2, $email) || preg_match($regex_mail_estd1, $email) || preg_match($regex_mail_estd2, $email)){
                if(strlen($preg) < 10) {
                    echo "<script language=\"javascript\">alert(\"Enunciado vacío o menor a 10 caracteres\");document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
                } else {
                    if(strlen($C) < 1 || strlen($I1) < 1 || strlen($I2) < 1 || strlen($I3) < 1) {
                        echo "<script language=\"javascript\">alert(\"Alguna de las respuestas está vacía\");document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
                    } else {
                        if(strlen($tema) < 1) {
                            echo "<script language=\"javascript\">alert(\"Tema de la pregunta no puede esstar vacío\");document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
                        } else {
                            $mysqli = mysqli_connect ($server, $user, $pass, $basededatos);
                            if (!$mysqli) {
                                die("<center><br/><br/><h2> Ha habido un problema con la conexión a la base de datos!</h2><br/><br/><br/><h3>Será redirigido al banco de preguntas en 5 segundos</h3><br/><br/><img src='../images/not.png' style='max-width:200px;'><br/><br/><br/>Detalle del error: ".mysqli_connect_error()."</center>");
                                echo "<script language=\"javascript\">document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
                            } else {
                                $sql = "INSERT INTO `Preguntas` (`email`, `pregunta`, `C`, `I1`, `I2`, `I3`, `tema`, `complejidad`, `Imagen`) VALUES  (?,?,?,?,?,?,?,?,?);";
                                if($stmt = mysqli_prepare($mysqli,$sql)){
                                    mysqli_stmt_bind_param($stmt, "ssssssdss", $email, $preg, $C, $I1, $I2, $I3, $complejidad, $tema, $img);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_close($mysqli);
                                    
                                    $xml= simplexml_load_file("../XML/Questions.xml");
                                    
                                    $assessmentItem = $xml->addChild("assessmentItem");
                                    $assessmentItem -> addAttribute("subject", $tema);
                                    $assessmentItem -> addAttribute("author", $email);
                                    
                                    $itemBody= $assessmentItem ->addChild("itemBody");
                                    $itemBody ->addChild("p", $preg);
                                    
                                    $correctResponse= $assessmentItem -> addChild("correctResponse");
                                    $correctResponse -> addChild("response", $C);
                                    
                                    $incorrectResponses= $assessmentItem -> addChild("incorrectResponses");
                                    $incorrectResponses -> addChild("response", $I1);
                                    $incorrectResponses -> addChild("response", $I2);
                                    $incorrectResponses -> addChild("response", $I3);
                                    
                                    $xml-> asXML("../XML/Questions.xml");
                                    
                                    echo "<script language=\"javascript\">document.location.href='ShowQuestionsWithImage.php?email=$email';</script>"; 
                                }
                                echo "<script language=\"javascript\">document.location.href='ShowQuestionsWithImage.php?email=$email';</script>"; 
                            }
                        }
                    }
                }
            } else {
               echo "<script language=\"javascript\">alert(\"No es un email institucional\");document.location.href='QuestionFormWithImage.php?email=$email';</script>"; 
            }
        }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
