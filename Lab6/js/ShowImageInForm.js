var verImg= function(event){
    var pegar= document.getElementById("pegar");
    pegar.src=URL.createObjectURL(event.target.files[0]);
    pegar.onload= function(){
    URL.revokeObjectURL(pegar.src)
    }
};