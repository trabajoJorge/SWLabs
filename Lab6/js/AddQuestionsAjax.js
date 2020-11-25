$(document).ready(function() {
    $("#AP").click(function(e){
        e.preventDefault(); //Cambia el ciclo de vida del programa
        var datos= document.getElementById("fquestion");
        var cosas= new FormData(datos);
        
        
        //Peticion ajax
        $.ajax({
            type: "post", enctype: "multipart/form-data", url: '../php/AddQuestionWithImage.php', data:cosas, processData: false, contentType: false,
                success: function(cosas){
                    $('#mensaje').click(showQuestions());
                }, error: function(cosas){
                    $('#mensaje').html("error del sistema");
                }
        });
    });
});