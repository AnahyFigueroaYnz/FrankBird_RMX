var status;

var mantenimiento = {
  nueva_version: function (argument) {
    $('#frm_new_version').on('submit', function (form) {
      form.preventDefault();
      var data = {
        'version': $('#nueva_version').val(),
      }

      var response = cargar_ajax.run_server_ajax('Mantenimiento/cambio_version', data);
      if (response == 'false') {
        title = "¡ERROR!";
        icon = "error";
        mensaje = "NO SE AGREGARON CORRECTAMENTE LOS DATOS";
      } else {
        icon = "success";
        title = "CORRECTO";
        mensaje = "SE AGREGARON CORRECTAMENTE LOS DATOS";
      }

      swal.fire({
        title: title,
        text: mensaje,
        icon: icon,
        timer: 2000,
        showConfirmButton: false,
        timerProgressBar: true,
      }).then((result) => {
        location.reload();
      });
    });
  },

  get_cambio: function (argument) {
    $('#switchAll').on('change', function (){
        if (this.checked == true) {
          status = 1;
        } else if (this.checked == false) {
          status = 0;
        }
        var data = {
          'activo': status,
        }

        cargar_ajax.run_server_ajax('Mantenimiento/cambio_status_all', data);
        location.reload();
    });

    $('.switch').on('change', function () {
        if (this.checked == true){
          status = 1;
        }else if (this.checked == false) {
          status = 0;
        }
        var data = {
          'activo': status,
          'id_controlador': $(this).data("id"),
        }

        cargar_ajax.run_server_ajax('Mantenimiento/cambio_status_oxo', data);
        location.reload();
    });
  },
}

jQuery(document).ready(function () { 
  mantenimiento.nueva_version(this);
  mantenimiento.get_cambio(this);
});