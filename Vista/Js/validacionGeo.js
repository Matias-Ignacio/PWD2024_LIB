
// Funcion que valida la direccion de ip
function validarIP(ip){
    const regex =  /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    return regex.test(ip);
}


// Validacion del formulario al enviarlo

(function(){
    'use strict';
    const form = document.getElementById('form');
    form.addEventListener('submit', function(event){
        const ipInput = document.getElementById('ip');
        let valido = document.getElementById('correcto');
        let invalido = document.getElementById('incorrecto');

        if(!validarIP(ipInput.value)){
            //Si la IP no es valida, mostrar feedback negativo y evitar el envio
            ipInput.classList.add('is-invalid');
            ipInput.classList.remove('is-valid');

            
            invalido.classList.remove('d-none');
            valido.classList.add('d-none');

            event.preventDefault();
            event.stopPropagation();
        }else{
            // si la  IP es valida, mostar feedback positivo
            ipInput.classList.add('is-valid');
            ipInput.classList.remove('is-invalid');

            valido.classList.remove('d-none');
            invalido.classList.add('d-none');
        }
        form.classList.add('was-validated');
    }, false);
})();