// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    //***************************************************** */
    //Validar nombre y apellido
    /****************************************************** */
    function validarNombre(obj){
        if($(obj).val() != "" && validarSoloLetra($(obj).val())){
            obj.setCustomValidity('');  // Restablecer la validez 
            return true;
        }else{
            obj.setCustomValidity(' '); 
            return false;
        } 
    }
    //***************************************************** */
    //Validar contraseña, contraeña no mayor a 8 caracteres y contenga  una letra
    /****************************************************** */
    function validarClave(obj){
        var cadena = $(obj).val();
        // Expresión regular para verificar que la clave tenga exactamente 7 números y al menos una letra
        var contieneLetraYNumero = /^(?=.*[A-Za-z])(?=.*\d{7})[A-Za-z\d]{8}$/;
    
        // Verificar si la contraseña cumple con los criterios
        if(!contieneLetraYNumero.test(cadena)){
            // Establecer mensaje de error si la validación falla
            obj.setCustomValidity('La contraseña debe tener al menos una letra y exactamente 7 números.');
            return false;
        }else{
            // Restablecer la validez si es correcta
            obj.setCustomValidity('');
            return true;
        }
    }
    
