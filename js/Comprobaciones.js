/*
 * Documento en el que se estipulan las funciones de javascript las cuale validan el codigo del lado
 * del cliente
 */

/*
 * Funcion que muestra la contraseña ingresada por el usuario con el proposito de verificar que es corecta
 */
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

/*
 * Funcion que valida la estructura del correo ingresado
 * por el usuario
 */
function validarCorreo() {
    document.getElementById('username').addEventListener('input', function () {
        campo = event.target;
        valido = document.getElementById('usernameOk');
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (emailRegex.test(campo.value)) {
            valido.innerText = "";
        } else {
            valido.innerText = "correo invalido";
        }
    });
}

/*
 * Funcion que revisa si en la contraseña se ha ingresado una
 * comtraeña vacia
 */function validarContraseña() {
    document.getElementById('password').addEventListener('input', function () {
        campo = event.target;
        valido = document.getElementById('passOK');
        emailRegex = /[ ]/;
        if (emailRegex.test(campo.value)) {
            valido.innerText = "Espacio Vacio";
        } else {
            valido.innerText = "";
        }
    });
}