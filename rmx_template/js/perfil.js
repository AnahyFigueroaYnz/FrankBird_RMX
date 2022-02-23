function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#imgUsuario").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#lblImg").on("click", function () {
        $("#fileImgUsuario").click(function () {});
    });

    var mask = $("#selLada").val();
    if (mask == "(+ 66)" || mask == "(+ 84)" || mask == "(+ 1)" || mask == "(+ 52)" || mask == "(+ 91)") {
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
    } else if (mask == "(+ 81)" || mask == "(+ 82)" || mask == "(+ 86)") {
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
    }

    $("#selLada").on("change", function () {
        if (this.value == "(+ 66)" || this.value == "(+ 84)" || this.value == "(+ 1)" || this.value == "(+ 52)" || this.value == "(+ 91)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        } else if (this.value == "(+ 81)" || this.value == "(+ 82)" || this.value == "(+ 86)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        }
    });

    var dataNombre = $("#dataNombre").html();
    var dataCorreo = $("#dataCorreo").html();
    var dataLada = $("#dataLada").html();
    var dataTelefono = $("#dataTelefono").html();
    var dataArea = $("#dataArea").html();
    var dataPuesto = $("#dataPuesto").html();
    var dataEmpresa = $("#dataEmpresa").html();
    var dataCalle = $("#dataCalle").html();
    var dataNoExt = $("#dataNoExt").html();
    var dataNoInt = $("#dataNoInt").html();
    var dataEntreCll = $("#dataEntreCll").html();
    var dataColonia = $("#dataColonia").html();
    var dataCodigoP = $("#dataCodigoP").html();
    var dataCiudad = $("#dataCiudad").html();
    var dataEstado = $("#dataEstado").html();
    var dataPais = $("#dataPais").html();
    var dataNotas = $("#dataNotas").html();

    var txtNombre = $("#txtNombre").val();
    var txtCorreo = $("#txtCorreo").val();
    var txtTelefono = $("#txtTelefono").val();
    var selLada = $("#selLada").val();
    var txtArea = $("#txtArea").val();
    var txtPuesto = $("#txtPuesto").val();
    var txtEmpresa = $("#txtEmpresa").val();
    var txtCalle = $("#txtCalle").val();
    var txtEntreC = $("#txtEntreC").val();
    var txtNoEx = $("#txtNoEx").val();
    var txtNoIn = $("#txtNoIn").val();
    var txtColonia = $("#txtColonia").val();
    var txtCodigoP = $("#txtCodigoP").val();
    var txtCiudad = $("#txtCiudad").val();
    var txtEstado = $("#txtEstado").val();
    var txtPais = $("#txtPais").val();
    var txtNotas = $("#txtNotas").val();

    $("#txtNombre").val(dataNombre);
    $("#txtCorreo").val(dataCorreo);
    $("#txtArea").val(dataArea);
    $("#txtPuesto").val(dataPuesto);
    $("#txtEmpresa").val(dataEmpresa);
    $("#txtCalle").val(dataCalle);
    $("#txtEntreC").val(dataEntreCll);
    $("#txtNoEx").val(dataNoExt);
    $("#txtNoIn").val(dataNoInt);
    $("#txtColonia").val(dataColonia);
    $("#txtCodigoP").val(dataCodigoP);
    $("#txtCiudad").val(dataCiudad);
    $("#txtEstado").val(dataEstado);
    $("#txtPais").val(dataPais);
    $("#txtNotas").val(dataNotas);

    if (dataLada == "(+ 66)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 84)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 1)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 52)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 82)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 81)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 91)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 86)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    }

    $("#btnGuardar").on("click", function () {
        var src = $("#imgUsuario").attr("src");
        $("#dataNombre").html(txtNombre);
        $("#dataCorreo").html(txtCorreo);
        $("#dataLada").html(selLada);
        $("#dataTelefono").html(txtTelefono);
        $("#dataArea").html(txtArea);
        $("#dataPuesto").html(txtPuesto);
        $("#dataEmpresa").html(txtEmpresa);
        $("#dataCalle").html(txtCalle);
        $("#dataEntreCll").html(txtEntreC);
        $("#dataNoExt").html(txtNoEx);
        $("#dataNoInt").html(txtNoIn);
        $("#dataColonia").html(txtColonia);
        $("#dataCodigoP").html(txtCodigoP);
        $("#dataCiudad").html(txtCiudad);
        $("#dataEstado").html(txtEstado);
        $("#dataPais").html(txtPais);
        $("#dataNotas").html(txtNotas);

        $("#imgNavUser").attr("src", "" + src + "");
        $("#imgDropUser").attr("src", "" + src + "");
        $("#imgPerfil").attr("src", "" + src + "");

        Toast.fire({
            icon: "success",
            title: "Perfil actualizado correctamente",
        });
    });
});
