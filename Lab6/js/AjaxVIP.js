function Comprobar_email(){
    xhr= new XMLHttpRequest();
    xhr.open('GET', '../php/ClientVerifyEnrollment.php?email='+$("#email").val(),true);
    xhr.onreadystatechange= function(){
        if (xhr.readyState == 4 && xhr.status==200){
            document.getElementById('comprobar_email').innerHTML= xhr.responseText;
        }
    }
    xhr.send('');
}
function Comprobar_pass(){
    xhr1= new XMLHttpRequest();
    xhr1.open('GET', '../php/ClientVerifyPass.php?pass='+$("#cont").val(),true);
    xhr1.onreadystatechange= function(){
        if (xhr1.readyState == 4 && xhr1.status==200){
            document.getElementById('comprobar_pass').innerHTML= xhr1.responseText;
        }
    }
    xhr1.send('');
}