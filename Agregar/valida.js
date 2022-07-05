function validar(){
    var nctrl, nombre, apaterno, amaterno, espec, edad, sexo, correo, expresion, expresionc;
    nctrl = document.getElementById("nc").value;
    nombre = document.getElementById("nom").value;
    apaterno = document.getElementById("apater").value;
    amaterno = document.getElementById("amater").value;
    espec = document.getElementById("especial").value;
    edad = document.getElementById("E").value;
    sexo = document.getElementById("S").value;
    correo = document.getElementById("Em").value;
    expresionc = /[A-Z]/;
    expresion = /\w+@\w+\.[a-z]/;
    if(nctrl==="" || nombre==="" || apaterno==="" || amaterno==="" || espec==="" || edad==="" || sexo==="" || correo===""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nctrl.length>14){
        alert("El numero de control es muy largo... tamaño máximo 14 caracteres");
        return false;
    }
    else if(nombre.length>20){
        alert("El nombre es muy largo... tamaño máximo 20 caracteres");
        return false;
    }
    else if(!expresionc.test(nombre)){
        alert("El nombre no es válido");
        return false;
    }
    else if(apaterno.length>15){
        alert("El apellido paterno es muy largo... tamaño máximo 15 caracteres");
        return false;
    }
    else if(!expresionc.test(apaterno)){
        alert("El apellido paterno no es válido");
        return false;
    }
    else if(amaterno.length>15){
        alert("El apellido materno es muy largo... tamaño máximo 15 caracteres");
        return false;
    }
    else if(!expresionc.test(amaterno)){
        alert("El apellido materno no es válido");
        return false;
    }
    else if(!expresionc.test(espec)){
        alert("La especialidad no es válida");
        return false;
    }
    else if(espec.length>20){
        alert("La especialidad es muy larga... tamaño máximo 20 caracteres");
        return false;
    }
    else if(edad.length>2){
        alert("La edad es muy larga... tamaño máximo 2 caracteres");
        return false;
    }
    else if(isNaN(edad)){
        alert("La edad ingresada no es un número");
        return false;
    }
    else if(sexo.length>1){
        alert("El dato ingresado (sexo) es muy largo... tamaño máximo 1 caracter");
        return false;
    }
    else if(!expresionc.test(sexo)){
        alert("El dato ingresado (sexo) no es válido");
        return false;
    }
    else if(correo.length>50){
        alert("El correo es muy larga... tamaño máximo 50 caracteres");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("El correo no es válido");
        return false;
    }
}