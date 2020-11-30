<!DOCTYPE html>
<html>
<head>
    
    <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/limpiar.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    
</head>
<body>
    <?php
    if(isset($_GET['email'])){
        include "MenuRegistrados.php";
        $email= $_GET['email'];
    } else {
        include "Menus.php";
    }
  ?>
  <section class="main" id="s1">
    <h1> Preguntas con AJAX </h1>
    <div>
        <form name="fquestion" enctype="multipart/form-data"  id="fquestion">
            Email (*): <input type=text value= "<?php echo $email?>" name="email" id="email" style="background-color:#CECECE;" readonly><br>
            Pregunta(*): <input type="text" name="preg" id="preg"><br>
            Respuesta correcta(*): <input type="text" name="C" id="C"><br>
            Respuesta incorrecta 1(*): <input type="text" name="I1" id="I1"><br>
            Respuesta incorrecta 2(*): <input type="text" name="I2" id="I2"><br>
            Respuesta incorrecta 3(*): <input type="text" name="I3" id="I3"><br>
            Complejidad de la pregunta(*):
            <select name="complejidad" id="complejidad">
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
            </select>   <br> 
            Tema: <input type="text" name="tema" id="tema"><br>  
            Foto: <br><input type="file" name="foto" id="foto" onChange="verImg(event)" acept "image/*" ><br>  
            <img src="" id="pegar" name="pegar" style= "max-width: 200px; max-height: 200px"><br><br>  
            <input type="button" value="Añadir pregunta" name="AP" id="AP"/>
            <input type="reset" value="Reset"  name="limpiar" onclick="limpiarF()" />
            <input type="button" value="Questions" name="bquestions" onclick="showQuestions()"/>
            <div class="mensaje" name="mensaje" id="mensaje">
            
            </div>
        </form>
        
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
