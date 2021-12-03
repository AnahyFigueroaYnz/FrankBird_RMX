// variables globales para la fecha actual
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  todayPrint = dd + '-' + mm + '-' + yyyy;
//
var valTarifa = false;

var administrador = {
    tarifario: function () {
        $('#tblTarifas').on( 'dblclick', 'tbody td', function () {
            var id = $(this).data('id');
            var NombreColumna = tableTarifas.column(this).header().textContent;
            switch (NombreColumna){
              case 'Origen':
                NombreColumna = 'id_origen';
                break;
              case 'Destino':
                NombreColumna = 'id_destino';
                break;
              case 'T. aerea':
                NombreColumna = 'tarifa_aerea';
                break;
              case 'Mov':
                NombreColumna = 'movimiento';
                break;
              case 'Lcl':
                NombreColumna = 'lcl_cbm';
                break;
              case '20 Ft':
                NombreColumna = 'ft20';
                break;
              case '40 Ft':
                NombreColumna = 'ft40';
                break;
              case '40 Hq':
                NombreColumna = 'hq40';
                break;
              case 'Tipo':
                NombreColumna = 'tipo';
                break;
              default:
                NombreColumna = "";
                break;
            }
            if (NombreColumna != ""){
                newInputTarifa(this, id, NombreColumna);
            }
        });

        function newInputTarifa(elm, dataid, NombreColumna) {
           $(elm).unbind('dblclick');
           var value_get = $(elm).text();
           var value = value_get.trim();
           var texto = value;
           $(elm).empty();
           if (NombreColumna == "id_origen" || NombreColumna == "id_destino") {
              $("<select>")
                .attr('class', 'form-control form-control-sm borders')
                .attr('id', 'selectChangeOrigen')
                .val(value)
                .on('change', function (e) {
                    closeSelectTarifas(elm, dataid, NombreColumna)
                })
                .appendTo($(elm));
              var x = document.getElementById("selectChangeOrigen");
              var resp_destinos = cargar_ajax.run_server_ajax('Administrador/get_destinosAjax');
              if (NombreColumna == "id_origen") {
                resp_destinos.forEach(elem => {
                  if (elem.tipo == 1 || elem.tipo == 3) {
                      var option = document.createElement("option");        
                      option.text = elem.destino;
                      option.value = elem.id_destino;
                      if (value == option.text) {
                        option.selected = "selected";
                      }
                      x.add(option);
                  }
                });
              }else if (NombreColumna == "id_destino") {
                resp_destinos.forEach(elem => {
                  if (elem.tipo >= 2 ) {
                      var option = document.createElement("option");        
                      option.text = elem.destino;
                      option.value = elem.id_destino;
                      if (value == option.text) {
                        option.selected = "selected";
                      }
                      x.add(option);
                  }
                });
              }
                  
           }else if(NombreColumna == "tipo"){
              $("<select>")
                .attr('class', 'form-control form-control-sm borders')
                .attr('id', 'selectChangeTipo')
                .val(value)
                .on('change', function (e) {
                    closeSelectTarifas(elm, dataid, NombreColumna)
                })
                .appendTo($(elm));
                var x = document.getElementById('selectChangeTipo');
                var option = document.createElement("option");        
                option.text = "Aer";
                option.value = 1;
                if (value == option.text) {
                  option.selected = "selected";
                }
                x.add(option);
                var option2 = document.createElement("option");        
                option2.text = "Mar";
                option2.value = 2;
                if (value == option2.text) {
                  option2.selected = "selected";
                }
                x.add(option2);
           }else if(NombreColumna == "movimiento"){
            $("<select>")
                .attr('class', 'form-control form-control-sm borders')
                .attr('id', 'selectChangeMovimiento')
                .val(value)
                .on('change', function (e) {
                    closeSelectTarifas(elm, dataid, NombreColumna)
                })
                .appendTo($(elm));
                var x = document.getElementById('selectChangeMovimiento');
                var option = document.createElement("option");        
                option.text = "Import";
                option.value = 1;
                if (value == option.text) {
                  option.selected = "selected";
                }
                x.add(option);
                var option2 = document.createElement("option");        
                option2.text = "Export";
                option2.value = 2;
                if (value == option2.text) {
                  option2.selected = "selected";
                }
                x.add(option2);
           }else{
              $("<input>")
                 .attr('type', 'text')
                 .attr('class', 'form-control form-control-sm borders')
                 .val(value)
                 .on('keyup', function (e) {
                      if (e.keyCode === 13) {
                          closeInputTarifa(elm, dataid, NombreColumna);
                      }else if (e.keyCode == 27) {
                          var value = $(elm).find('input').val();
                          $(elm).empty();
                          var span =$('<span class="td-text"></span').appendTo($(elm));
                          span.text(texto);
                      }
                 })
                 .blur(function () {
                    var value = $(elm).find('input').val();
                    $(elm).empty();
                    var span =$('<span class="td-text"></span').appendTo($(elm));
                    span.text(texto);
                 })
                 .appendTo($(elm))
                 .focus();
           }

           $(document).keyup(function (e) {
              if (e.keyCode == 27) {
                var value = $(elm).find('input').val();
                $(elm).empty();
                var span =$('<span class="td-text"></span').appendTo($(elm));
                span.text(texto);
              }
            })
        }

        function closeInputTarifa(elm, dataid, NombreColumna) {
           var value = $(elm).find('input').val();
           var data ={
              id_catalogo: dataid,
              columna: NombreColumna,
              valor: value,
           }
           cargar_ajax.run_server_ajax('Administrador/EditarTarifa', data);
           location.reload();
        }

        function closeSelectTarifas(elm, dataid, NombreColumna) {
           var value = $(elm).find('select').val();
           var data ={
              id_catalogo: dataid,
              columna: NombreColumna,
              valor: value,
           }
            cargar_ajax.run_server_ajax('Administrador/EditarTarifa', data);
            location.reload();
        }

        $(document).on('click', '#btnNuevaTarifa', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $('#modal_nuevaTarifa').modal('show');
            });
            $('#titulo_modalTarifa').html('Agregar tarifa');
        });

        $(document).on('click','.eliminar_tarifa', function (e) {
            e.preventDefault();
            var data = { 
              id_tarifa: $(this).data('id'),
              activo: 0,
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "La tarifa se eliminará!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Administrador/eliminar_tarifa", data);
                    Swal.fire({
                        title: 'Eliminado',
                        text: 'Se eliminó correctamente',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                    
                }
            });
        });

        $(document).on('click', '.closeTarifa', function (e) {
            e.preventDefault();
            $('#selIdOrigen').val(0);
            $('#selIdDestino').val(0);
            $('#txt_tarifaAerea').val('');
            $('#txt_lcl').val('');
            $('#txt_Ft20').val('');
            $('#txt_Ft40').val('');
            $('#txt_Hq40').val('');
            $('#selTipoTarifa').val(0);
            document.getElementById('divTipo').style.display = 'none';
            document.getElementById('divOrigen').style.display = 'none';
            document.getElementById('divDestino').style.display = 'none';
            $('#txt_tarifaAerea').removeAttr('required');
            $('#txt_lcl').removeAttr('required');
            $('#txt_Ft20').removeAttr('required');
            $('#txt_Ft40').removeAttr('required');
            $('#txt_Hq40').removeAttr('required');
            document.getElementById('divLcL').style.display = 'none';
            document.getElementById('div20FT').style.display = 'none';
            document.getElementById('div40FT').style.display = 'none';
            document.getElementById('div40HQ').style.display = 'none';
            document.getElementById('divTarifaAer').style.display = 'none';
            $('#selTipoMovimiento').val(0);
            document.getElementById('divTipoMovimiento').style.display = 'none';
        });

        $('#selTipoTarifa').on('change', function (e) {
          e.preventDefault();
            if ($(this).val() == 0) {
              document.getElementById('divLcL').style.display = 'none';
              document.getElementById('div20FT').style.display = 'none';
              document.getElementById('div40FT').style.display = 'none';
              document.getElementById('div40HQ').style.display = 'none';
              document.getElementById('divTarifaAer').style.display = 'none';

              $('#txt_tarifaAerea').removeAttr('required');
              $('#txt_lcl').removeAttr('required');
              $('#txt_Ft20').removeAttr('required');
              $('#txt_Ft40').removeAttr('required');
              $('#txt_Hq40').removeAttr('required');
            }else if ($(this).val() == 1) {
              document.getElementById('divTarifaAer').style.display = '';
              $('#txt_tarifaAerea').attr('required', 'true');

              document.getElementById('divLcL').style.display = 'none';
              document.getElementById('div20FT').style.display = 'none';
              document.getElementById('div40FT').style.display = 'none';
              document.getElementById('div40HQ').style.display = 'none';
              $('#txt_lcl').removeAttr('required');
              $('#txt_Ft20').removeAttr('required');
              $('#txt_Ft40').removeAttr('required');
              $('#txt_Hq40').removeAttr('required');
            }else if ($(this).val() == 2) {
              document.getElementById('divTarifaAer').style.display = 'none';
              $('#txt_tarifaAerea').removeAttr('required');

              document.getElementById('divLcL').style.display = '';
              document.getElementById('div20FT').style.display = '';
              document.getElementById('div40FT').style.display = '';
              document.getElementById('div40HQ').style.display = '';
              $('#txt_lcl').attr('required', 'true');
              $('#txt_Ft20').attr('required', 'true');
              $('#txt_Ft40').attr('required', 'true');
              $('#txt_Hq40').attr('required', 'true');
            }
        });

        function ValidacionCrearTarifa() {
            //if validaciones
            if ($('#selTipoTarifa').val() == 0) {
              document.getElementById('divTipo').style.display = '';
            }else{
              document.getElementById('divTipo').style.display = 'none';
            }

            if ($('#selTipoMovimiento').val() == 0) {
              document.getElementById('divTipoMovimiento').style.display = '';
            }else{
              document.getElementById('divTipoMovimiento').style.display = 'none';
            }

            if ($('#selIdOrigen').val() == 0) {
              document.getElementById('divOrigen').style.display = '';
            }else{
              document.getElementById('divOrigen').style.display = 'none';
            }

            if ($('#selIdDestino').val() == 0) {
              document.getElementById('divDestino').style.display = '';
            }else{
              document.getElementById('divDestino').style.display = 'none';
            }

            if ($('#selTipoTarifa').val() != 0 && $('#selIdOrigen').val() != 0 && $('#selIdDestino').val() != 0 && $('#selTipoMovimiento').val() != 0){
                valTarifa = true;
            }else{
                valTarifa = false;
            }
        }

        //agregar tarifa
        $('#frmTarifa').on('submit', function (form) {
            form.preventDefault();
            
            ValidacionCrearTarifa();

            if (valTarifa) {
              var data ={
                  id_origen: $('#selIdOrigen').val(),
                  id_destino: $('#selIdDestino').val(),
                  tarifa_aerea: $('#txt_tarifaAerea').val(),
                  lcl_cbm: $('#txt_lcl').val(),
                  ft20: $('#txt_Ft20').val(),
                  ft40: $('#txt_Ft40').val(),
                  hq40: $('#txt_Hq40').val(),
                  tipo: $('#selTipoTarifa').val(),
                  movimiento: $('#selTipoMovimiento').val(),
              }
              
              var response = cargar_ajax.run_server_ajax('Administrador/crearTarifa', data);
              //toastr options
                toastr.options = {
                    "progressBar": true,
                    "onclick": null,
                    "showDuration": "200",
                    "hideDuration": "500",
                    "timeOut": "1000",
                }
                toastr.options.onHidden = function () {
                    location.reload();
                };
              //

              if (response == 'false') {
                toastr.error("No se pudo crear", "Error!");
              }else{
                toastr.success("Se inserto la información correctamente", "Creación correcta");
              }
            }
        });
    },

    destinos: function () {
        // abrir modal y ajustar titulo de modal
        $(document).on('click', '#btnNuevoDestino', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $('#modal_nuevoDestino').modal('show');
            });
        });

        $('#frmAgregar_destino').on('submit', function (form) {
          form.preventDefault();
          if ($('#selTipoDestino').val() != 0) {
            document.getElementById('divTiposDestino').style.display = 'none';
            var data ={
              destino: $('#txt_destino').val(),
              tipo: $('#selTipoDestino').val(),
            }
            var response = cargar_ajax.run_server_ajax('Administrador/crearDestino', data);
            //toastr options
              toastr.options = {
                  "progressBar": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
              }
              toastr.options.onHidden = function () {
                  location.reload();
              };
            //
            if (response == 'false') {
              toastr.error("No se pudo crear", "Error!");
            }else{
              toastr.success("Se inserto la información correctamente", "Creación correcta");
              tableDestinosCot.ajax.reload();
            }
            jQuery.noConflict();
              jQuery(function ($) {
                  $('#modal_nuevoDestino').modal('hide');
            });
          }else{
            document.getElementById('divTiposDestino').style.display = '';
          }
        })

        $('#tbl_destinosCotizador').on( 'dblclick', 'tbody td', function () {
            var id = $(this).data('id');
            var NombreColumna = tableDestinosCot.column(this).header().textContent;
            if (NombreColumna != ""){
                newInput(this, id, NombreColumna);
            }
        } );

        function closeInput(elm, dataid, NombreColumna) {
           var value = $(elm).find('input').val();
           var data ={
              id_destino: dataid,
              columna: NombreColumna,
              valor: value,
           }
           cargar_ajax.run_server_ajax('Administrador/updateDestinos', data);
           $(elm).empty().text(value);
           tableDestinosCot.ajax.reload();
        }

        function closeSelect(elm, dataid, NombreColumna) {
           var value = $(elm).find('select').val();
           var data ={
              id_destino: dataid,
              columna: NombreColumna,
              valor: value,
           }
           cargar_ajax.run_server_ajax('Administrador/updateDestinos', data);
           $(elm).empty().text(value);
           tableDestinosCot.ajax.reload();
        }

        function newInput(elm, dataid, NombreColumna) {
           $(elm).unbind('dblclick');
           var value = $(elm).text();
           var texto = $(elm).text();
           $(elm).empty();
            if (NombreColumna == 'Tipo') {
                if (value == "Origen") {
                    value = 1;
                }else if (value == "Destino") {
                    value = 2;
                }else if (value == "Origen y Destino") {
                    value = 3;
                }

                $("<select>")
                   .attr('class', 'form-control form-control-sm borders')
                   .attr('id', 'selectChangeOrigen')
                   .val(value)
                   .on('change', function (e) {
                        closeSelect(elm, dataid, NombreColumna)
                   })
                   .appendTo($(elm));
                var x = document.getElementById("selectChangeOrigen");
                var option1 = document.createElement("option");
                    option1.text = "Origen";
                    option1.value = 1;
                    if (value == option1.value) {
                        option1.selected = "selected";
                    }
                    x.add(option1);
                var option2 = document.createElement("option");
                    option2.text = "Destino";
                    option2.value = 2;
                    if (value == option2.value) {
                        option2.selected = "selected";
                    }
                    x.add(option2);
                var option3 = document.createElement("option");
                    option3.text = "Origen y Destino";
                    if (value == option3.value) {
                        option3.selected = "selected";
                    }
                    option3.value = 3;
                    x.add(option3);
            }else if (NombreColumna == 'Nombre') {
                $("<input>")
                   .attr('type', 'text')
                   .attr('class', 'form-control form-control-sm borders')
                   .val(value)
                   .on('keyup', function (e) {
                        if (e.keyCode === 13) {
                            closeInput(elm, dataid, NombreColumna);
                        }else if (e.keyCode == 27) {
                            var value = $(elm).find('input').val();
                            $(elm).empty().text(value);
                            tableDestinosCot.ajax.reload();
                        }
                   })
                   .blur(function () {
                      var value = $(elm).find('input').val();
                      $(elm).empty().text(texto);
                      tableDestinosCot.ajax.reload();
                   })
                   .appendTo($(elm))
                   .focus();
            }

            $(document).keyup(function (e) {
              if (e.keyCode == 27) {
                var value = $(elm).find('input').val();
                $(elm).empty().text(texto);
                tableDestinosCot.ajax.reload();
              }
            })
        }

        $(document).on('click', '.eliminar_destino', function (e) {
            e.preventDefault();
            var data = { 
              id_destino: $(this).data('id'),
              activo: 0,
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "El destino se eliminará!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Administrador/eliminar_destino", data);
                    Swal.fire({
                        title: 'Eliminado',
                        text: 'Se eliminó correctamente',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        tableDestinosCot.ajax.reload();
                        $('#tbl_destinosCotizador_filter input').val('');
                        tableDestinosCot.search('').draw();
                    });
                    
                }
            });
        });

        $(document).on('click', '.closeAdDestino', function (e) {
            e.preventDefault();
            $('#txt_destino').val('');
            $('#selTipoDestino').val(0); 
        })
    },

    cotizaciones: function () {
        $(document).on('click', '.eliminar_cotCotizador', function (e) {
            e.preventDefault();
            var data = { 
              id_cotizador: $(this).data('id'),
              activo: 0,
            };
            swal.fire({
                title: "¿Está seguro?",
                text: "La cotización se eliminará!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax("Administrador/eliminar_cotCotizador", data);
                    Swal.fire({
                        title: 'Eliminado',
                        text: 'Se eliminó correctamente',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                    
                }
            });
        });      
    },

    cambio: function () {
      $('#btnTipoCambio').on('click', function (e) {
        e.preventDefault();
        var cambio = $('#txtTipoCambioTarifas').val();
        if (cambio != 0) {
          var data ={
            tipoCambio: cambio,
            fecha_creacion: today,
          }
          cargar_ajax.run_server_ajax('Administrador/ActualizarTipo',data);
          location.reload();
        }else{
          document.getElementById('divVal_TipoCambio').style.display = '';
        }
      });
    }
}
jQuery(document).ready(function () {
    administrador.tarifario(this);
    administrador.destinos(this);
    administrador.cotizaciones(this);
    administrador.cambio(this);
});