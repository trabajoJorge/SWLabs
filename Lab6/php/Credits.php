<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
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
        
      <h2>DATOS DEL AUTOR/AUTORES</h2><br/>
      <h3>Jorge Iglesias</h3> 
      <h3>Mauricio Contreras</h3> 
      <h3>Software</h3> <br>
      <img src="../images/logo.png" style="max-width:250px;">
      <h5>jiglesias019@ikasle.ehu.eus</h5> <br>
      <h5>mcontreras009@ikasle.ehu.eus</h5><br>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
