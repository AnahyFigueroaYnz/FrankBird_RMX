const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        cancelButton: "btn btn-outline-danger btn-nuevo padding-buttons",
        confirmButton: "btn btn-outline-success btn-nuevo margin-buttons",
    },
    buttonsStyling: false,
});

var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
});

var idProy;
$(document).ready(function () {
    $(document).on("click", ".editProyecto", function (event) {
        event.preventDefault();
        id = $(this).data("id");
        idProy = id;
        pyFolio = $("#tdFolio" + id  + "").html();
        pyNombre = $("#tdNombre" + id  + "").html();
        pyStatus = $("#tdStatus" + id  + "").html();
        pyAsesor = $("#tdAsesor" + id  + "").html();

        $("#modalProyecto").modal();
        $("#titleModalP").html(pyFolio + "_" + pyNombre);
        $("#selEstatus option").each(function () {
            if ($(this).val() != pyStatus) {
                $(this).removeAttr("selected");
            } else if ($(this).val() == pyStatus) {
                $(this).attr("selected", "true");
            }
        });
        $("#selAsesor option").each(function () {
            if ($(this).val() != pyAsesor) {
                $(this).removeAttr("selected");
            } else if ($(this).val() == pyAsesor) {
                $(this).attr("selected", "true");
            }
        });
    });

    $(document).on("click", ".saveProyecto", function (event) {
        event.preventDefault();
        id = idProy;
        pyFolio = $("#tdFolio" + id  + "").html();
        pyNombre = $("#tdNombre" + id  + "").html();
        pyStatus = $("#tdStatus" + id  + "").html();
        pyAsesor = $("#tdAsesor" + id  + "").html();

        asesor = $("#selAsesor").val();
        status = $("#selEstatus").val();

        $("#tdStatus" + id  + "").html(status);
        $("#tdAsesor" + id  + "").html(asesor);

        $("#modalProyecto").modal("hide");
    });
});