var tyc;
var nivel;
var base_url = $("#baseURL").html();
console.log(base_url);
function showLoginPwd() {
    var inConfPass = $("#txtClave").attr("type");
    if (inConfPass == "password") {
        $("#txtClave").attr("type", "text");
        $("#iShowPass").removeClass('fa fa-eye showlogpwd');
        $("#iShowPass").addClass('fa fa-eye-slash showlogpwd');
    } else {
        $("#txtClave").attr("type", "password");
        $("#iShowPass").removeClass('fa fa-eye-slash showlogpwd');
        $("#iShowPass").addClass('fa fa-eye showlogpwd');
    }
}

var home = {
    login: function () {
        // comprobar si el usuario ya acepto los terminos y condiciones
        $('#btnIngresar').on('click', function (e) {
            e.preventDefault();
            var data = {
                email: $('#txtUsuario').val(),
                contrasena: $('#txtClave').val(),
            }
            resp_login = cargar_ajax.run_server_ajax('Login/fun_login', data);
            if (resp_login.autenticacion == false) {
                swal.fire({
                    title: "Error!",
                    text: "Usuario o contraseña no coinciden!",
                    icon: "warning",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            } else {
                window.location.assign(base_url + 'Dashboard');
            }
        });
    },
}
jQuery(document).ready(function () {
    home.login(this);
});