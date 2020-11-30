<?php
    echo "<table border=1>";
        echo "<tr><th><b>Autor</b></th><th><b>Enunciado</b></th><th><b>Respuesta</b></th></tr>";
        if (!$xml= simplexml_load_file("../XML/Questions.xml")){
            echo "<script> Alert('Algo salio mal'); </script>";
        }else{
            foreach ($xml as $assessmentItem){
                echo "<tr>";
                echo "<td>".$assessmentItem["author"]."</td>";
                echo "<td>".$assessmentItem->itemBody->p."</td>";
                echo "<td>".$assessmentItem->correctResponse->response."</td>";
                echo "</tr>";
            }
        }
    echo "</table>";
?>
