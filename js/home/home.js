var tyc;
var nivel;
var base_url;

function showPwd() {
    var inPassword = $("#input_password").attr("type");
    if (inPassword == "password") {
        $("#input_password").attr("type", "text");
        $("#eyePassword").removeClass('fa fa-eye showpwd');
        $("#eyePassword").addClass('fa fa-eye-slash showpwd');
    } else {
        $("#input_password").attr("type", "password");
        $("#eyePassword").removeClass('fa fa-eye-slash showpwd');
        $("#eyePassword").addClass('fa fa-eye showpwd');
    }
}
function showConfPwd() {
    var inConfPass = $("#input_password_confirm").attr("type");
    if (inConfPass == "password") {
        $("#input_password_confirm").attr("type", "text");
        $("#eyeConfPass").removeClass('fa fa-eye showconfpwd');
        $("#eyeConfPass").addClass('fa fa-eye-slash showconfpwd');
    } else {
        $("#input_password_confirm").attr("type", "password");
        $("#eyeConfPass").removeClass('fa fa-eye-slash showconfpwd');
        $("#eyeConfPass").addClass('fa fa-eye showconfpwd');
    }
}
function showLoginPwd() {
    var inConfPass = $("#contrasena").attr("type");
    if (inConfPass == "password") {
        $("#contrasena").attr("type", "text");
        $("#eyeLoginPass").removeClass('fa fa-eye showlogpwd');
        $("#eyeLoginPass").addClass('fa fa-eye-slash showlogpwd');
    } else {
        $("#contrasena").attr("type", "password");
        $("#eyeLoginPass").removeClass('fa fa-eye-slash showlogpwd');
        $("#eyeLoginPass").addClass('fa fa-eye showlogpwd');
    }
}

function signValid() {
    var nombre = $("#input_name").attr("class");
    if (nombre == "form-control") {
        $(".dvIntro").removeClass("error");
        $(".dvForm").removeClass("error");
        $(".extra").removeClass("error");
        // $(".dvForm").addClass("valid");
        // $(".extra").addClass("valid");
    } else if (nombre == "form-control valid") {
        $("#errorName").remove();
    } else if (nombre == "form-control error") {
        $(".dvIntro").addClass("error");
        $(".dvForm").addClass("error");
        $(".extra").addClass("error");
    }    
}
var home = {
    inicio: function () {
        $("#ver").on("click", function (e) {
            e.preventDefault();
            if ($('#input_password').attr("type") == "password") {
                $('#input_password').removeAttr("type");
                $('#input_password').attr("type", "text");
            } else {
                $('#input_password').removeAttr("type");
                $('#input_password').attr("type", "password");
            }

        });
        $("#ver2").on("click", function (e) {
            e.preventDefault();
            if ($('#input_password_confirm').attr("type") == "password") {
                $('#input_password_confirm').removeAttr("type");
                $('#input_password_confirm').attr("type", "text");
            } else {
                $('#input_password_confirm').removeAttr("type");
                $('#input_password_confirm').attr("type", "password");
            }

        });

        base_url = $('#baseURL').html();
        pSheight = $("#input_password").css("height");
        pCSheight = $("#input_password_confirm").css("height");

        $("#spPassword").css({
            height: "calc(70px - " + pSheight + ")",
        });
        $("#spConfPass").css({
            height: "calc(70px - " + pCSheight + ")",
        });

        signValid();
    },

    singin: function () {

        $("#chkTyC").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                tyc = 1;
            } else {
                $(this).attr('value', 'false');
                tyc = 0;
            }
        });

        $('#agregar_cliente').on('submit', function (form) {
            form.preventDefault();
            if ($("#agregar_cliente").valid()) {
                if ($('#chkTyC').is(':checked')) {
                    $("#chkTyC").prop('checked', true);
                    var pass = $('#input_password').val();
                    var conpas = $('#input_password_confirm').val();
                    if (pass != conpas) {
                        swal.fire({
                            title: "Error!",
                            text: "Contraseñas no coinciden!",
                            icon: "warning",
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                    } else {
                        base_url = $('#baseURL').html();
                        var data = {
                            email: $('#input_correo').val(),
                            nombre: $('#input_name').val(),
                            contrasena: $('#input_password').val(),
                            id_lada: $('#sel_Lada').val(),
                            telefono: $('#input_phone').val(),
                            id_nivelusuario: 4,
                            tyc: tyc,
                        }
                        response = cargar_ajax.run_server_ajax('Home/crear_usuarios_h', data);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                        }

                        if (response.insert == false) {
                            if (response.info == 'ya existe') {
                                toastr.error("Correo ya en uso", "No se pudo crear el usuario");
                            } else if (response.info == 'error al insertar') {
                                toastr.error("Error al enviar solicitud", "No se pudo crear el usuario");
                            }
                        } else {
                            if (response.autenticacion == false) {
                                toastr.error("No se pudo crear el usuario", "Error!");
                            } else {
                                toastr.options.onHidden = function () {
                                    // this will be executed after fadeout, i.e. 2secs after notification has been show
                                    window.location.assign(base_url + 'Home/Ingresar');
                                };

                                toastr.success("Registro exitoso", "Actualización Correcta");
                            }
                        }
                    }
                }
            }
        })
    },

    login: function () {
        // comprobar si el usuario ya acepto los terminos y condiciones
        $('#btn_ingresar').on('click', function (e) {
            e.preventDefault();
            var baseURL = $("#baseURL").html();
            $(".file_box").empty();
            var data = {
                email: $('#email').val(),
            }
            var response = cargar_ajax.run_server_ajax('Home/get_usuario', data);
            nivel = response.id_nivelusuario;
            if (response.tyc == "0") {
                $("#alert_notice").removeClass("sec_hidden");
                $(".login_info .login-form.mt_90").css("margin-top", "55px");
                $(".login_info .extras").css("margin-bottom", "5px");
                $('#idUser').val(response.id_usuario);
            } else {
                $("#alert_notice").addClass("sec_hidden");
                $(".login_info .login-form").css("margin-top", "90px");
                $(".login_info .extras").css("margin-bottom", "45px");
                var data = {
                    email: $('#email').val(),
                    contrasena: $('#contrasena').val(),
                }
                resp_login = cargar_ajax.run_server_ajax('Home/fun_login', data);
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
                    if (nivel == 1) {
                        window.location.assign(base_url + 'Mantenimiento/DashboardRoot');
                    } else if (nivel == 2) {
                        window.location.assign(base_url + 'Plataforma/DashboardAdministrador');
                    } else if (nivel == 3) {
                        window.location.assign(base_url + 'Plataforma/DashboardAsesor');
                    } else if (nivel == 4) {
                        window.location.assign(base_url + 'Clientes/DashboardCliente');
                    } else if (nivel == 5) {
                        window.location.assign(base_url + 'Plataforma/DashboardAgente');
                    }
                }
            }
        });
        // actualizar los permisos
        $('#chkTyC').on('change', function () {
            console.log(this.checked);
            if (this.checked == true) {
                var id_usuario = $('#idUser').val();
                var tyc_pl = {
                    id_usuario: id_usuario,
                    tyc: 1
                }
                cargar_ajax.run_server_ajax('Home/update_tyc', tyc_pl);
                var data = {
                    email: $('#email').val(),
                    contrasena: $('#contrasena').val(),
                }
                resp_login = cargar_ajax.run_server_ajax('Home/fun_login', data);
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
                    if (nivel == 1) {
                        window.location.assign(base_url + 'Mantenimiento/DashboardRoot');
                    } else if (nivel == 2) {
                        window.location.assign(base_url + 'Plataforma/DashboardAdministrador');
                    } else if (nivel == 3) {
                        window.location.assign(base_url + 'Plataforma/DashboardAsesor');
                    } else if (nivel == 4) {
                        window.location.assign(base_url + 'Clientes/DashboardCliente');
                    } else if (nivel == 5) {
                        window.location.assign(base_url + 'Plataforma/DashboardAgente');
                    }
                }
            }
        });
    },

    recover: function () {
        $('#recover_pass').on('submit', function (form) {
            form.preventDefault();
            var data = {
                email: $('#email').val(),
            }

            var response = cargar_ajax.run_server_ajax('Home/enviarContrasena', data);
            if (response.error == 'No encontrado') {
                swal.fire({
                    title: "Error!",
                    text: "No se encontro usuario",
                    icon: "warning",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    onClose: () => {
                        window.location.assign(base_url + 'Home/Ingresar')
                    },
                });
            } else if (response.error == 'formulario no enviado') {
                swal.fire({
                    title: "Error!",
                    text: "Formulario no enviado, verifique la información",
                    icon: "warning",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    onClose: () => {
                        window.location.assign(base_url + 'Home/Ingresar')
                    },
                });
            } else if (response.error == 'Enviado correctamente') {
                swal.fire({
                    title: "Correcto",
                    text: "Su contraseña se ha enviado correctamente al correo de destino",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    onClose: () => {
                        window.location.assign(base_url + 'Home/Ingresar')
                    },
                });
            }
        });
    },

    contacto: function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);

        $('#contactForm').on('submit', function (form) {
            form.preventDefault();
            if ($("#contactForm").valid()) {
                base_url = $('#baseURL').html();
                var data = {
                    u_name: $('#u_name').val(),
                    u_email: $('#u_email').val(),
                    u_subject: $('#u_subject').val(),
                    u_content: $('#u_content').val(),
                    u_phone: $('#u_phone').val(),
                }

                cargar_ajax.run_server_ajax('Home/EnviandoCorreo', data);
                swal.fire({
                    title: "Correcto",
                    text: "Mensaje enviado",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(function () {
                    window.location.assign(base_url + 'Home');
                });
            }
        })
    }
}
jQuery(document).ready(function () {
    home.inicio(this);
    home.singin(this);
    home.login(this);
    home.contacto(this);
    home.recover(this);
});