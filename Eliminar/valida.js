function validar(){
    var nctrl;
    nctrl = document.getElementById("nc").value;
    if(nctrl==="" || nombre==="" || apaterno==="" || amaterno==="" || espec==="" || edad==="" || sexo==="" || correo===""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nctrl.length>14){
        alert("El numero de control es muy largo... tamaño máximo 14 caracteres");
        return false;
    }