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

function showPasswordupdate() {
    var x = document.getElementById("newpassword");
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
 * Funcion que valida la estructura del correo ingresado
 * por el usuario
 */
function validarCorreoresetpass() {
    var url = document.getElementById("usernameresetpass").value;
    var pattern = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (pattern.test(url)) {
    } else {
        alert("Correo electronico incorrecto");
    }
    return false;
}

/*
 * Funcion que revisa si en la contraseña se ha ingresado una
 * comtraeña vacia
 */
function validarContraseña() {
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

function cantidablanco() {
    document.getElementById('quantity').addEventListener('input', function () {
        campo = event.target;
        valido = document.getElementById('quantityOk');
        emailRegex = /[ ]/;
        if (emailRegex.test(campo.value)) {
            valido.innerText = "Espacio Vacio";
        } else {
            valido.innerText = "";
        }
    });
}

function  nombreblanco() {
    document.getElementById('elementname').addEventListener('input', function () {
        campo = event.target;
        valido = document.getElementById('elementOk');
        emailRegex = /[ ]/;
        if (emailRegex.test(campo.value)) {
            valido.innerText = "Espacio Vacio";
        } else {
            valido.innerText = "";
        }
    });
}
function  referenciablanco() {
    document.getElementById('reference').addEventListener('textarea', function () {
        campo = event.target;
        valido = document.getElementById('referenceOk');
        emailRegex = /[ ]/;
        if (emailRegex.test(campo.value)) {
            valido.innerText = "Espacio Vacio";
        } else {
            valido.innerText = "";
        }
    });
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return (key >= 48 && key <= 57);
}