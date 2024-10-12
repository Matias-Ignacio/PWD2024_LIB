


function validarIP(ip){
    const regex =  /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    return regex.test(ip);
}



(function (){
    'use strict';
    const form = document.getElementById('form');
    form.addEventListener('submit', function(event){
        const ipInput1 = document.getElementById('ip1');
        const ipInput2 = document.getElementById('ip2');
        let valido1 = document.getElementById('correcto1');
        let invalido1 = document.getElementById('incorrecto1');
        let valido2 = document.getElementById('correcto2');
        let invalido2 = document.getElementById('incorrecto2');
        

        let ip1Valido = validarIP(ipInput1.value);
        let ip2Valido = validarIP (ipInput2.value);

        if(!ip1Valido){
            ipInput1.classList.add('is-invalid');
            ipInput1.classList.remove('is-valid');
            invalido1.classList.remove('d-none');
            valido1.classList.add('d-none');
            event.preventDefault();
            event.stopPropagation();
        }else{
            ipInput1.classList.add('is-valid');
            ipInput1.classList.remove('is-invalid');
            valido1.classList.remove('d-none');
            invalido1.classList.add('d-none');
        }


        if(!ip2Valido){
            ipInput2.classList.add('is-invalid');
            ipInput2.classList.remove('is-valid');
            invalido2.classList.remove('d-none');
            valido2.classList.add('d-none');
            event.preventDefault();
            event.stopPropagation();
        }else{
            ipInput2.classList.add('is-valid');
            ipInput2.classList.remove('is-invalid');
            invalido2.classList.add('d-none');
            valido2.classList.remove('d-none');

        }

       
        form.classList.add('was-validated');
    }, false);
})();