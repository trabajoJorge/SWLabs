function showQuestions(){
    if (XMLHttpRequest){
        xhr= new XMLHttpRequest();
        xhr.open('GET', 'tablaPreguntas.php',true);
        xhr.onreadystatechange= function(){
            if (xhr.readyState == 4 && xhr.status==200){
                    document.getElementById('mensaje').innerHTML=xhr.responseText;
            }
        }
        xhr.send('');
    } 
}
