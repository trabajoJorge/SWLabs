function  validate_form() {
    var mailProfe1 = /^[a-zA-Z]+(\.?[a-zA-Z]+)?\@ehu\.eus$/;
    var mailProfe2 = /^[a-zA-Z]+(\.?[a-zA-Z]+)?\@ehu\.es$/;
    var mailAlumno1 = /^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.eus$/;
    var mailAlumno2 = /^[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.es$/;
    var email= $("#email").val();
    if(email.length<1) {  
        alert("Por favor, introduce el email");
        return false;
    } else {
        if( !(email.match(mailProfe1) || 
                email.match(mailProfe2) || 
                email.match(mailAlumno1) || 
                email.match(mailAlumno2)) ) {
            alert('No es un e-mail institucional');
            return false;
        }
    }
    
    var preg= $("#preg").val();
    if(preg.length<1){
        alert("La pregunta no ha sido introducida");
        return false;
    }
    if (preg.length<10){
        alert("La pregunta no ha sido introducida correctamente \n tiene que tener mas de 10 caracteres");        
        return false;
    }
    
    var C= $("#C").val();
    if (C.length<1){
        alert("La respuesta correcta no ha sido introducida");
        return false;
    }
    
    var I1= $("#I1").val();
    if (I1.length<1){
        alert("La respuesta Incorrecta 1 no ha sido introducida");
        return false;
    }
    
    var I2= $("#I2").val();
    if (I2.length<1){
        alert("La respuesta Incorrecta 2 no ha sido introducida");
        return false;
    }
    
    var I3= $("#I3").val();  
    if (I3.length<1){
        alert("La respuesta Incorrecta 3 no ha sido introducida");
        return false;
    }
    
    var tema= $("#tema").val();
    if (tema.length<1){
        alert("El tema no ha sido introducido");
        return false;
    }
    
    return true;
}