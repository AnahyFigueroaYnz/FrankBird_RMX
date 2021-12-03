//Declaración de variables globales
  var tsi;
  var res = 0;
  var i = 0;
  var val_done = false;
  var val_envio = false;
  var val_presup = false;
  var pedido = new Array();
  var productos_prov = new Array();
  var id_prov_interno = 1;
  var fila;
  var val_pb = false;

  var id_cliente = $('#txt_id_cliente').val();
  var frm = $("#agregar_pedido");
  var path_temporal;

  //Variables para imagenes productos_sp
  var arreglo_imagenes = new Array();
  var frmData = new FormData();
  var countimagen = 1;
  var file_Files = " ";

  //Variables para archivos invoice
  var arreglo_invoice = new Array();
  var frmData_inv = new FormData();
  var file_Files_invoice = " ";

  //variables para imagen oem   input_imgOEM
  var file_Files_oem = " ";
  var frmData_oem = new FormData();
  var path_oem_temporal;

  // variables globales para la fecha actual
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  todayPrint = dd + '-' + mm + '-' + yyyy;
//End Variables

//Validaciones
  $('#productosList').hide();
  
  //validaciones para inputs seccion proyecto base (presupuesto)
  function validacion_pb() {
    var presupuesto = $('#inpt_precio_meta').val();
    //div_val_precio_m_pb    
    //presupuesto
    if (presupuesto != '') {
      document.getElementById('div_val_precio_m_pb').style.display = 'none';
    }
    else if (presupuesto == '') {
      document.getElementById('div_val_precio_m_pb').style.display = '';
    }

    //si todos los campos de proveedor estan llenos
    if (presupuesto != '') {
      val_pb = true;
    } //si aunque sea uno no lo esta
    else {
      val_pb = false;
    }
  }

  //validaciones para inputs seccion proveedores, productos_prov y productos_sp
  function validacion_campos() {
    //declaracion de variables
    //proveedor
    var nombre_prov = $('#inpt_nombre_proveedor').val();
    //div_val_nombre_prov
    var email = $('#inpt_email_proveedor').val();
    //div_val_email_prov
    var contacto = $('#inpt_contacto_proveedor').val();
    //div_val_contacto_prov

    //productos prov
    var producto_prov = $('#producto').val();
    //
    var vantidad_prod_prov = $('#cantidad').val();
      var unidad_prod_prov = $('#slUnidades_prod_prov').val();
    //

    //productos sp
    var nombre_prod_sp = $('#inpt_form_producto').val();
    //div_val_nombre_prod_sp
    var cantidad_prod_sp = $('#inpt_form_cantidad').val();
    //div_val_cantidad_prod_sp
    var unidades_prod_sp = $('#selUnidades_prod_sp').val();
    //div_val_selUnidades_prod_sp
    var especif_prod_sp = $('#inpt_form_especificaciones').val();
    //div_val_especif_prod_sp

    if (tsi == 1) {
      //validar nombre_prov
      if (nombre_prov != '') {
        document.getElementById('div_val_nombre_prov').style.display = 'none';
      }
      else if (nombre_prov == '') {
        document.getElementById('div_val_nombre_prov').style.display = '';
      }
      //validar email
      if (email != '') {
        document.getElementById('div_val_email_prov').style.display = 'none';
      }
      else if (email == '') {
        document.getElementById('div_val_email_prov').style.display = '';
        
      }
      if (/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) 
      {
        document.getElementById('div_val_email_formt_prov').style.display = 'none';
      }else if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) {
        document.getElementById('div_val_email_formt_prov').style.display = '';
      }
      //validar contacto
      if (contacto != '') {
        document.getElementById('div_val_contacto_prov').style.display = 'none';
      }
      else if (contacto == '') {
        document.getElementById('div_val_contacto_prov').style.display = '';
      }
      //
      if (productos_prov.length === 0) {
        if (producto_prov == '') {
          document.getElementById('val_prodProv').style.display = '';
          document.getElementById('producto').style.borderColor = "red";

        } else if (producto_prov != '') {
          document.getElementById('val_prodProv').style.display = 'none';
          document.getElementById('producto').style.borderColor = "";
        }
        //
        if (vantidad_prod_prov == '') {
          document.getElementById('val_cantidadprodProv').style.display = '';
          document.getElementById('cantidad').style.borderColor = "red";

        } else if (vantidad_prod_prov != '') {
          document.getElementById('val_cantidadprodProv').style.display = 'none';
          document.getElementById('cantidad').style.borderColor = "";
        }
        if (unidad_prod_prov == 0) {
          document.getElementById('val_unidadprodProv').style.display = '';
          $('#slUnidades_prod_prov').removeClass('border-submit');
          $('#slUnidades_prod_prov').addClass('border-submit2');

        } else if (unidad_prod_prov != 0) {
          document.getElementById('val_unidadprodProv').style.display = 'none';
          $('#slUnidades_prod_prov').removeClass('border-submit2');
          $('#slUnidades_prod_prov').addClass('border-submit');
        }
      }else{
        unidad_prod_prov = 1; 
        vantidad_prod_prov = "a";
        producto_prov = "a";
          document.getElementById('val_prodProv').style.display = 'none';
          document.getElementById('producto').style.borderColor = "";

          document.getElementById('val_cantidadprodProv').style.display = 'none';
          document.getElementById('cantidad').style.borderColor = "";
          
          document.getElementById('val_unidadprodProv').style.display = 'none';
          $('#slUnidades_prod_prov').removeClass('border-submit2');
          $('#slUnidades_prod_prov').addClass('border-submit');
      }


      //si todos los campos de proveedor estan llenos
      if ((nombre_prov && contacto && vantidad_prod_prov && producto_prov) != '' && unidad_prod_prov != 0 && (email != '' && ( /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email))) ) {
        val_done = true;
      } //si aunque sea uno no lo esta
      else {
        val_done = false;
      }
    }   //producto_sp
    else if (tsi == 0) {
      //validar nombre_prod_sp
      if (nombre_prod_sp != '') {
        document.getElementById('div_val_nombre_prod_sp').style.display = 'none';
      }
      else if (nombre_prod_sp == '') {
        document.getElementById('div_val_nombre_prod_sp').style.display = '';
      }
      //validar cantidad_prod_sp
      if (cantidad_prod_sp != '') {
        document.getElementById('div_val_cantidad_prod_sp').style.display = 'none';
      }
      else if (cantidad_prod_sp == '') {
        document.getElementById('div_val_cantidad_prod_sp').style.display = '';
      }

      if (unidades_prod_sp == 0) {
        document.getElementById('div_val_selUnidades_prod_sp').style.display = '';
      }
      else if (unidades_prod_sp != 0) {
        document.getElementById('div_val_selUnidades_prod_sp').style.display = 'none';
      }
      //validar especif_prod_sp
      if (especif_prod_sp != '') {
        document.getElementById('div_val_especif_prod_sp').style.display = 'none';
      }
      else if (especif_prod_sp == '') {
        document.getElementById('div_val_especif_prod_sp').style.display = '';
      }

      //si todos los campos de producto sp estan llenos
      if (((nombre_prod_sp && cantidad_prod_sp && especif_prod_sp) != '') && (unidades_prod_sp != 0)) {
        val_done = true;
      } //si aunque sea uno no lo esta
      else {
        val_done = false;
      }
    }
  }

  //validaciones para inputs y radio seccion envio
  function validacion_envio() {
      //Declaracion de variables
      var destino = $('#inpt_form_destinoEntrega').val();
      var tipo = $('input:radio[name=radio_envio]:checked').val();
      var otro_inpt = $('#inpt_form_otro').val();
      var llenado_envio = false;
      //end variables

      //Proceso de validacion

        //destino
        if (destino != '') {
          document.getElementById('div_val_destino_pb').style.display = 'none';
        }
        else if (destino == '') {
          document.getElementById('div_val_destino_pb').style.display = '';
        }

        //tipo
        if ($("#agregar_pedido input[name='radio_envio']:radio").is(':checked')) {
            //oculta el div de los radios
            document.getElementById('div_val_radio_pb').style.display = 'none';
            llenado_envio = true;
        } else {     //si no hay ninguno seleccionado
          document.getElementById('div_val_radio_pb').style.display = '';
          llenado_envio = false;
        }
    //end proceso de validacion

    //Validacion final
      if ((destino != '') && (llenado_envio == true)) {
        val_envio = true;
      }
      else {
        val_envio = false;
      }
    //end validacion
  }
//end validaciones

//Funciones de plugins
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
  }
  
  // funcion de la mascara de moneda
  var options = {
      onKeyPress: function (cep, e, field, options) {
        if (cep.length <= 6) {
          var inputVal = parseFloat(cep);
          jQuery('#money').val(inputVal.toFixed(2));
        } var masks = ['#,##0.00', '0.00'];
        mask = (cep == 0) ? masks[1] : masks[0];
        // $('#money').mask(mask, options);
      },
      reverse: true
    };
  // funcion de la mascara para cantidades
  var optionsA = {
    onKeyPress: function (cepA, e, field, optionsA) {
      if (cepA.length <= 6) {
        var inputVal = parseFloat(cepA);
        jQuery('#money').val(inputVal.toFixed(2));
      } var masks = ['#,##0', '0'];
      mask = (cepA == 0) ? masks[1] : masks[0];
      // $('#money').mask(mask, optionsA);
    },
    reverse: true
  };

  function bootstrapTabControl() {
    var i, items = $('.nav-link-modal'),
      pane = $('.tab-pane'),
      btn = $('.btn-step-modal');
    $('.nexttab').on('click', function () {
      validacion_campos();

      if (val_done == true) {
        for (i = 0; i < items.length; i++) {
          if ($(items[i]).hasClass('active') == true) {
            break;
          }
        }
        for (j = 0; j < pane.length; j++) {
          if ($(pane[j]).hasClass('show active') == true) {
            break;
          }
        }
        for (l = 0; l < btn.length; l++) {
          if ($(btn[l]).hasClass('btn-active') == true) {
            break;
          }
        }
        if (i == 0) {
          if (i < items.length - 1) {
            $(items[i]).removeClass('active');
            $(items[i]).removeClass('fontBold');
            $(items[i + 1]).addClass('active');
            $(items[i + 1]).addClass('fontBold');
          }

          if (j < pane.length - 1) {
            $(pane[j]).removeClass('show active');
            $(pane[j + 1]).addClass('show active');
          }

          if (l < btn.length - 1) {
            $(btn[l]).removeClass('btn-active');
            $(btn[l + 1]).addClass('btn-active');
          }
        }
        else if (i == 1) {
          validacion_envio();
          if (val_envio == true) {
            if (i < items.length - 1) {
              $(items[i]).removeClass('active');
              $(items[i]).removeClass('fontBold');
              $(items[i + 1]).addClass('active');
              $(items[i + 1]).addClass('fontBold');
            }

            if (j < pane.length - 1) {
              $(pane[j]).removeClass('show active');
              $(pane[j + 1]).addClass('show active');
            }

            if (l < btn.length - 1) {
              $(btn[l]).removeClass('btn-active');
              $(btn[l + 1]).addClass('btn-active');
            }
          }
        }

      }

    });
    $('.prevtab').on('click', function () {
      for (i = 0; i < items.length; i++) {
        if ($(items[i]).hasClass('active') == true) {
          break;
        }
      }
      for (j = 0; j < pane.length; j++) {
        if ($(pane[j]).hasClass('show active') == true) {
          break;
        }
      }
      for (l = 0; l < btn.length; l++) {
        if ($(btn[l]).hasClass('btn-active') == true) {
          break;
        }
      }
      if (i != 0) {
        $(items[i]).removeClass('active');
        $(items[i]).removeClass('fontBold');
        $(items[i - 1]).addClass('active');
        $(items[i - 1]).addClass('fontBold');
      }

      if (j != 0) {
        $(pane[j]).removeClass('show active');
        $(pane[j - 1]).addClass('show active');
      }

      if (l != 0) {
        $(btn[l]).removeClass('btn-active');
        $(btn[l - 1]).addClass('btn-active');
      }
    });
  }

  bootstrapTabControl();

//End funciones de plugins

//Funciones de opciones
  function resetclose() {
    while (pedido.length > 0) pedido.pop();
    while (productos_prov.length > 0) productos_prov.pop();
    id_prov_interno = 1;
    val_pb = false;
    //Reset de formulario
    document.getElementById("agregar_pedido").reset();
    //reset tabla 
    $(".prueba").html('');
    $('#productosList').hide();

    for (var key of frmData.keys()) {
      frmData.delete(key);
    }

    //limpiar oem
    document.getElementById("filesOEM").value = "";
    file_Files_oem = " ";

    document.getElementById("oem_lleno").style.display = 'none';
    document.getElementById("cancelOEM").style.display = 'none';
    document.getElementById("fileIcon").style.display = '';
    document.getElementById("fileExist").style.display = 'none';
    document.getElementById("limpiarOEM").style.display = '';
  }

  $("#btnNuevoPedido").click(function (event) {
    event.preventDefault();
    var sel = $(this);
    
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        cancelButton: 'btn btn-outline-primary btn-nuevo padding-buttons btnsi',
        confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons btnno'
      },
      buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
      title: '¿Cuenta con proveedor?',
      //icon: 'question',
      imageUrl: 'https://reachmx.com/resources/fabrica.png',
      imageHeight: 100,
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
      reverseButtons: false,
      allowOutsideClick: false,
      allowEscapeKey : false,
      focusConfirm: true
    }).then((result) => {
      $(sel).closest('tr').remove();
      if (result.value) {
        jQuery.noConflict();
        $('#formulario').modal('show');
        $('#prod').hide();
        $('#prov').show();
        $('#form_prod').hide();
        $('#form_prov').show();
        $('#tit_prod').hide();
        $('#tit_prov').show();
        //creacion de requireds
        tsi = 1;
      } else if (result.dismiss === "cancel") {
        jQuery.noConflict();
        $('#formulario').modal('show');
        $('#prov').hide();
        $('#prod').show();
        $('#form_prov').hide();
        $('#form_prod').show();
        $('#tit_prov').hide();
        $('#tit_prod').show();
        //creacion de requireds 
        tsi = 0;
      } else if (result.dismiss == "close") {

        resetclose();
      }
    });
  });

    //agrega producto a proveedor
      $('#btnCrearAccion').click(function () {
        //Declaracion de variables
          var producto = document.getElementById("producto").value;
          var cant = document.getElementById("cantidad").value;
          var unidades = document.getElementById("slUnidades_prod_prov").value;
          var unidad = '';
          var cantidad = parseFloat((cant).replace(/,/g, ""));
          var cantFix = (cantidad).toFixed(2);
          var cantStr = String(cantFix);
          var cantN = numberWithCommas(cantStr);
        //

        //if unidades
          if (unidades === '1') {
            unidad = 'pzas';
          } else if (unidades === '2') {
            unidad = 'mts';
          } else if (unidades === '3') {
            unidad = 'kg';
          } else if (unidades === '4') {
            unidad = 'm2';
          } else if (unidades === '5') {
            unidad = 'tm';
          } else if (unidades === '6') {
            unidad = 'tn';
          } else if (unidades === '7') {
            unidad = 'l';
          } else if (unidades === '8') {
            unidad = 'kt';
          }
        //

        //Validacion
          if (producto != '' && cant != '' && unidades != 0) {
            $('#productosList').show();
            fila =
              '<tr id="row' + i + '" class="prueba">' +
              '<td pedido-prov-name>' + producto + '</td>' +
              '<td pedido-prov-det>' + cantN + ' ' + unidad + '</td>' +
              '<td style="display:none;">' + unidades + '</td>' +
              '<td pedido-prov-icon>' +
              '<span>' +
              '<i class="fas fa-minus-circle btn_remove" name="remove" id="' + i + '" style="color: red;"></i>' +
              '</span>' +
              // '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button>'+
              '</td>' +
              '</tr>'; //esto seria lo que contendria la fila

            var data = {
              'id': i,
              id_prov_interno: id_prov_interno,
              'prod': producto,
              'cant': cantidad,
              'unidades': unidades,
            };
            productos_prov.push(data);
            i++;

            $('#table_productos_generar tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#table_productos_generar tr").length;
            $("#adicionados").append(nFilas - 1);
            //le resto 1 para no contar la fila del header
            document.getElementById("cantidad").value = "";
            document.getElementById("producto").value = "";
            document.getElementById("slUnidades_prod_prov").value = 0;
            document.getElementById("producto").focus();
            document.getElementById('val_prodProv').style.display = 'none';
            document.getElementById('producto').style.borderColor = "";
            document.getElementById('val_cantidadprodProv').style.display = 'none';
            document.getElementById('cantidad').style.borderColor = "";
            document.getElementById('val_unidadprodProv').style.display = 'none';
            $('#slUnidades_prod_prov').removeClass('border-submit2');
            $('#slUnidades_prod_prov').addClass('border-submit');
            $('#agreg_prod').modal('hide');
          } else {
            if (producto == '') {
              document.getElementById('val_prodProv').style.display = '';
              document.getElementById('producto').style.borderColor = "red";
            } else if (producto != '') {
              document.getElementById('val_prodProv').style.display = 'none';
              document.getElementById('producto').style.borderColor = "";
            }

            //
            if (cant == '') {
              document.getElementById('val_cantidadprodProv').style.display = '';
              document.getElementById('cantidad').style.borderColor = "red";
            } else if (cant != '') {
              document.getElementById('val_cantidadprodProv').style.display = 'none';
              document.getElementById('cantidad').style.borderColor = "";
            }

            //
            if (unidades == 0) {
              document.getElementById('val_unidadprodProv').style.display = '';
              $('#slUnidades_prod_prov').removeClass('border-submit');
              $('#slUnidades_prod_prov').addClass('border-submit2');

            } else if (unidades != 0) {
              document.getElementById('val_unidadprodProv').style.display = 'none';
              $('#slUnidades_prod_prov').removeClass('border-submit2');
              $('#slUnidades_prod_prov').addClass('border-submit');
            }
          }
        //
      });
    //

    // cancela formulario y limpiar campos
      $(document).on('click', '.closeProd', function (event) {
        event.preventDefault();
        document.getElementById("cantidad").value = "";
        document.getElementById("producto").value = "";
        document.getElementById("slUnidades_prod_prov").value = 0;
        document.getElementById("producto").focus();
        if (productos_prov.length > 0) {
          if (document.getElementById("producto").value == '') {
            document.getElementById('val_prodProv').style.display = 'none';
            document.getElementById('producto').style.borderColor = "";
          }
          if (document.getElementById("cantidad").value == '') {
            document.getElementById('val_cantidadprodProv').style.display = 'none';
            document.getElementById('cantidad').style.borderColor = "";
          }
          if (document.getElementById("slUnidades_prod_prov").value == 0) {
            document.getElementById('val_unidadprodProv').style.display = 'none';
            $('#slUnidades_prod_prov').removeClass('border-submit2');
            $('#slUnidades_prod_prov').addClass('border-submit');
          }
        }
      });
    //

    //remueve la fila
      $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        $("#adicionados").text("");
        var nFilas = $("#table_productos_generar tr").length;
        $("#adicionados").append(nFilas - 1);

        for (i = 0; i < productos_prov.length; i++) {
          if (productos_prov[i].id == button_id) {
            productos_prov.splice(productos_prov.indexOf(productos_prov[i]), 1);
          }
        }

        if (productos_prov.length == 0) {
          $('#productosList').hide();
        }
      });
    //

    $('#crear').click(function () {
      $('#agreg_prod').modal();
    });

    $("input").on("click", function () {
      if ($("input:checked").val() == 'otros') {
        $('#div-envioOpciones').removeClass('col-md-12');
        $('#div-envioOpciones').addClass('col-md-6');
        $('#div-envioOtros').show();
      } else {
        $('#div-envioOpciones').removeClass('col-md-6');
        $('#div-envioOpciones').addClass('col-md-12');
        $('#div-envioOtros').hide();
      }
    });

    $('#especif').focusout(function () {
      var especif = $(this).val();
    });

    $('#espec_prod').focusout(function () {
      var espec_prod = $(this).val();
    });

    $('#imgInp').focusout(function () {
      var imgInp = $(this).val();
    });

    $(".custom-file-input").on("change", function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

//End funciones de opciones

// funciones que de inciaran al inciar la pagina
  $(document).ready(function () {
              //jQuery.noConflict();
          // asignar la mascara de moneda al formulario
            $("#cantidad").mask('#,##0.00', options);
            $('#inpt_form_cantidad').mask('#,##0.00', options);
            $("#inpt_precio_meta").mask('#,##0.00', options);
    
      // funcion de las ladas que limitan la cantidad de numeros y el orden de estos como numero telefonico correspondiente a la cual eligan 
        $("#sel_Lada").change(function () {
          $("#sel_Lada option:selected").each(function () {
            // prevenir funciones de jquery en el javscript
              jQuery.noConflict();
              var tel = $("#inpt_telefono_proveedor").val();
              var Value = $('#sel_Lada option:selected').text();
              if (tel !== '') {
                  $("#inpt_telefono_proveedor").val('');
              }
              // prevenir funciones de jquery en el javscript
              jQuery(function ($) {
                  if (Value == 'lada') {
                      $('#spLada').html('');
                      $("#inpt_telefono_proveedor").attr("placeholder", "");
                      $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = true;
                  } else if (Value == '(+ 1)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 52)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 66)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 81)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 0000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 0000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 82)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 0000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 0000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 84)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  } else if (Value == '(+ 86)') {
                      $('#spLada').html(Value);
                      $("#inpt_telefono_proveedor").attr("placeholder", "(000) 0000 0000");
                      $("#inpt_telefono_proveedor").mask('(000) 0000 0000');
                      document.getElementById('inpt_telefono_proveedor').disabled = false;
                  }
              });
          });
        });


        // al cerrar o cancelar el formulario restaurar/limpiar todos los valores 
        $("#btnCloseModalProv").click(function () {
          var btnActivo = document.getElementsByClassName('btn-active');
          var tabActivo = document.getElementsByClassName('show active');
          var liActivo = document.getElementsByClassName('fontBold active');
          var btn1 = document.getElementById('btnPaso1');
          var tab1 = document.getElementById('tabProvProd');
          var li1 = document.getElementById('liProd-prob');
          $('#' + btnActivo[0].id).removeClass('btn-active');
          $('#' + btn1.id).addClass('btn-active');
          $('#' + tabActivo[0].id).removeClass('show active');
          $('#' + tab1.id).addClass('show active');
          $('#' + liActivo[0].id).removeClass('fontBold active');
          $('#' + li1.id).addClass('fontBold active');    
          $('#sel_Lada').val(0);
          $("#inpt_telefono_proveedor").attr("placeholder", "");
          document.getElementById('inpt_telefono_proveedor').disabled = true;
          $('#lblFactura').html('');
          $('#inputFactura').val('');
          $('#colapOEMService').removeClass('show');
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              cancelButton: 'btn btn-outline-danger btn-nuevo padding-buttons',
              confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons'
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: '¿Seguro?',
            text: "¡Perderas los datos que hayas guardado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, aceptar.',
            cancelButtonText: 'Cancelar.'
          }).then((result) => {
            if (result.value) {
              $('#formulario').modal('toggle');
              resetclose();
            }
          });
        });

        // limpiar input file
        $("#btnLimpiarFactura").click(function () {
          $('#lblFactura').html('');
          $('#inputFactura').val('');
        });

        $('#div-envioOtros').hide();

    });
//end

var clientes = {
    captura_archivo: function (argument) {
      //Seccion productos
      $('#filesImgProd').on('change', function (e) {
        var inputFile = e.currentTarget;
        file_Files = inputFile.files[0];
        document.getElementById("imgfolder").style.display = 'none';
        document.getElementById("fileExistimg").style.display = '';
        document.getElementById("cancelImgProd").style.display = '';
      });
      $('#cancelImgProd').on('click', function (e) {
        e.preventDefault();
        file_Files = " ";
        document.getElementById("imgfolder").style.display = '';
        document.getElementById("fileExistimg").style.display = 'none';
        document.getElementById("cancelImgProd").style.display = 'none';
      });

      //Seccion invoice
      $('#inputFactura').on('change', function (e) {
        var inputFile = e.currentTarget;
        file_Files_invoice = inputFile.files[0];
      });
      $('#btnLimpiarFactura').on('click', function (e) {
        file_Files_invoice = " ";
        document.getElementById("inputFactura").value = "";
      });

      //Seccion OEM
      $('#filesOEM').on('change', function (e) {
        var inputFile = e.currentTarget;
        file_Files_oem = inputFile.files[0];
        document.getElementById("fileIcon").style.display = 'none';
        document.getElementById("fileExist").style.display = '';
      });
      $('#limpiarOEM').on('click', function (e) {
        e.preventDefault();
        file_Files_oem = " ";
        document.getElementById("filesOEM").value = "";
        document.getElementById("fileIcon").style.display = '';
        document.getElementById("fileExist").style.display = 'none';
      });
      $('#cancelOEM').on('click', function (e) {
        e.preventDefault();
        document.getElementById("filesOEM").value = "";
        file_Files_oem = " ";

        document.getElementById("oem_lleno").style.display = 'none';
        document.getElementById("cancelOEM").style.display = 'none';
        document.getElementById("fileIcon").style.display = '';
        document.getElementById("fileExist").style.display = 'none';
        document.getElementById("lblOEM").style.display = '';
        document.getElementById("limpiarOEM").style.display = '';
      });
    },

    //Funcion de submit, agrega proyecto base y envia los frmData
    add_proyecto_base: function () {
      $('#agregar_pedido').on('submit', function (form) {
      form.preventDefault();
      validacion_pb();
      if (val_pb == true) {
        var tipo_enviovar;
        var tipo = $('input:radio[name=radio_envio]:checked').val();

        //if para radio
        if (tipo == "Aereo") {
          tipo_enviovar = "Aereo";
        }
        else if (tipo == "Marítimo") {
          tipo_enviovar = "Maritimo";
        }

        var presupuesto = $('#inpt_precio_meta').val();
        var presu = parseFloat((presupuesto).replace(/,/g, ""));

        if (file_Files_oem != " ") {
          path_oem_temporal = file_Files_oem.name;
        }
        else {
          path_oem_temporal = null;
        }

        //Data general proyecto base
        var data_proyecto_base = {
          id_cliente: $('#txt_id_cliente').val(),
          presupuesto: presu,
          colores: $('#inpt_form_colores').val(),
          preferencia_empaque: $('#inpt_form_empaquetado').val(),
          comentarios: $('#inpt_comentarios').val(),
          tipo_envio: tipo_enviovar,
          destino: $('#inpt_form_destinoEntrega').val(),
          fecha_creacion: today,
          oemservice_path: path_oem_temporal,
        }

        if (tsi == 1) { //si seleccionó proveedor 
            if (file_Files_invoice != " ") {
              var filename = file_Files_invoice.name;

              var data_invoice = {
                id: id_prov_interno,
                nombre_original: filename,
                path: 'files/invoice_cliente/',
              }

              arreglo_invoice.push(data_invoice);
              frmData_inv.append('' + id_prov_interno + '', file_Files_invoice);

              path_temporal = id_prov_interno + "_" + filename;
            }else {
              path_temporal = null;
            }

          var data_proveedor_cliente = {
            id_prov_interno: id_prov_interno,
            tipo_data: 'proveedor_cliente',
            proveedor: $('#inpt_nombre_proveedor').val(),
            email: $('#inpt_email_proveedor').val(),
            contacto: $('#inpt_contacto_proveedor').val(),
            id_lada: $('#sel_Lada').val(),
            telefono: $('#inpt_telefono_proveedor').val(),
            direccion: $('#inpt_direccion_proveedor').val(),
            productos: productos_prov,
            invoice_path: path_temporal,
          }

            pedido.push(data_proveedor_cliente);
            id_prov_interno++;
        }else if (tsi == 0) { //si selecciono producto 
            var cant = $('#inpt_form_cantidad').val();
            var cantidad = parseFloat((cant).replace(/,/g, ""));

            if (file_Files != " ") {
              var filename = file_Files.name;

              var data_img = {
                id: countimagen,
                nombre_original: filename,
                ruta: 'files/productos_sp/',
              }

              arreglo_imagenes.push(data_img);
              frmData.append('' + countimagen + '', file_Files);

              path_temporal = countimagen + "_" + filename;
            }else {
              path_temporal = null;
            }

          var data_producto_sp_cliente = {
              tipo_data: 'productos_sp_cliente',
              producto: $('#inpt_form_producto').val(),
              color_oem: $('#inpt_form_colores').val(),
              cantidad: cantidad,
              unidades: $('#selUnidades_prod_sp').val(),
              especificaciones: $('#inpt_form_especificaciones').val(),
              img_path: path_temporal,
          }
          pedido.push(data_producto_sp_cliente);
        }

        data_pedido_final =
        {
          'data_proyecto_base': data_proyecto_base,
          'pedido': pedido,
        }

        var response = cargar_ajax.run_server_ajax('Clientes/agregar_proyecto_base', data_pedido_final);

        if (response == 'false') { // || response == undefined) {
          title = "¡ERROR!";
          icon = "error";
          mensaje = "NO SE AGREGARON CORRECTAMENTE LOS DATOS";
        } else {
            icon = "success";
            title = "CORRECTO";
            mensaje = "SE AGREGARON CORRECTAMENTE LOS DATOS";

            //Envio de imagenes productos sp
            if (arreglo_imagenes != 0) {
              frmData.append('imgs', JSON.stringify(arreglo_imagenes));
              frmData.append('id_cliente', id_cliente);
              cargar_ajax2.run_server_ajax2('Clientes/enviar', frmData);
            }

            //Envio de archivos invoice
            if (arreglo_invoice != 0) {
              frmData_inv.append('archivos_invoice', JSON.stringify(arreglo_invoice));
              frmData_inv.append('id_cliente', id_cliente);
              cargar_ajax2.run_server_ajax2('Clientes/enviar_inv', frmData_inv);
            }

            //Envio oem
            if (file_Files_oem != 0) {
              frmData_oem.append('oemservice_path', file_Files_oem);
              frmData_oem.append('id_cliente', id_cliente);
              cargar_ajax2.run_server_ajax2('Clientes/cargar_oem', frmData_oem);
            }
        }

        swal({
          title: title,
          text: mensaje,
          type: icon,
          closeOnConfirm: false
        }, function () {
          window.location.assign(base_url + 'Clientes/mis_pedidos');
        });
      }
      });
    },

    //Funcion para agregar otro producto o proveedor
    add_arreglo: function () {
      //Agrega un nuevo producto, boton agregar +
      $('#btnAgregarMas').on('click', function (form) {
          form.preventDefault();
          jQuery.noConflict();

          validacion_campos();
          if (val_done == true) {
          
        if (tsi == 1) //Si seleccionó proveedor
        {
          //Obtencion de datos del proveedor
          if (file_Files_invoice != " ") {
            var filename = file_Files_invoice.name;

            var data_invoice = {
              id: id_prov_interno,
              nombre_original: filename,
              path: 'files/invoice_cliente/',

            }

            arreglo_invoice.push(data_invoice);
            frmData_inv.append('' + id_prov_interno + '', file_Files_invoice);

            path_temporal = id_prov_interno + "_" + filename;
          }
          else {
            path_temporal = null;
          }

          var data_proveedor_cliente = {
            tipo_data: 'proveedor_cliente',
            id_prov_interno: id_prov_interno,
            proveedor: $('#inpt_nombre_proveedor').val(),
            email: $('#inpt_email_proveedor').val(),
            contacto: $('#inpt_contacto_proveedor').val(),
            id_lada: $('#sel_Lada').val(),
            telefono: $('#inpt_telefono_proveedor').val(),
            direccion: $('#inpt_direccion_proveedor').val(),
            productos: productos_prov,
            invoice_path: path_temporal,
          }
          pedido.push(data_proveedor_cliente);
          id_prov_interno++;
        } else if (tsi == 0) {  //si selecciono producto 
          var cant = $('#inpt_form_cantidad').val();
          var cantidad = parseFloat((cant).replace(/,/g, ""));

          if (file_Files != " ") {
            var filename = file_Files.name;

            var data_img = {
              id: countimagen,
              nombre_original: filename,
              ruta: 'files/productos_sp/',
            }

            arreglo_imagenes.push(data_img);
            frmData.append('' + countimagen + '', file_Files);

            path_temporal = countimagen + "_" + filename;
          }
          else {
            path_temporal = null;
          }

          var data_producto_sp_cliente = {
            id: countimagen,
            tipo_data: 'productos_sp_cliente',
            producto: $('#inpt_form_producto').val(),
            cantidad: cantidad,
            unidades: $('#selUnidades_prod_sp').val(),
            color_oem: $('#inpt_form_colores').val(),
            especificaciones: $('#inpt_form_especificaciones').val(),
            img_path: path_temporal,
          }
          countimagen++;
          pedido.push(data_producto_sp_cliente);
        }

            //reset
              //Reset de formulario
              document.getElementById("agregar_pedido").reset();
              
              //reset tabla 
              $(".prueba").html('');
              $('#productosList').hide();

              //reset variable file
                if (file_Files != " "){
                  document.getElementById("imgfolder").style.display = '';
                  document.getElementById("fileExistimg").style.display = 'none';
                  document.getElementById("cancelImgProd").style.display = 'none';
                }
              
              file_Files = " ";
              file_Files_invoice = " "; path_temporal = " ";

              if (file_Files_oem != " ") {
                document.getElementById("oem_lleno").style.display = '';
                document.getElementById("cancelOEM").style.display = '';
                document.getElementById("fileExist").style.display = 'none';
                document.getElementById("fileIcon").style.display = 'none';
                document.getElementById("limpiarOEM").style.display = 'none';
              }
            //

            //mostrar siguiente 
              var btnActivo = document.getElementsByClassName('btn-active');
              var tabActivo = document.getElementsByClassName('show active');
              var liActivo = document.getElementsByClassName('fontBold active');
              var btn1 = document.getElementById('btnPaso1');
              var tab1 = document.getElementById('tabProvProd');
              var li1 = document.getElementById('liProd-prob');
              $('#' + btnActivo[0].id).removeClass('btn-active');
              $('#' + btn1.id).addClass('btn-active');
              $('#' + tabActivo[0].id).removeClass('show active');
              $('#' + tab1.id).addClass('show active');
              $('#' + liActivo[0].id).removeClass('fontBold active');
              $('#' + li1.id).addClass('fontBold active');

              $('#spLada').html('');
              $('#sel_Lada').val(0);
              $("#inpt_telefono_proveedor").attr("placeholder", "");
              document.getElementById('inpt_telefono_proveedor').disabled = true;
              $('#lblFactura').html('');
              $('#inputFactura').val('');
              $('#colapOEMService').removeClass('show');

              $('#formulario').modal('hide');
              var sel = $(this);
              const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  cancelButton: 'btn btn-outline-primary btn-nuevo padding-buttons',
                  confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons'
                },
                buttonsStyling: false
              });

              swalWithBootstrapButtons.fire({
                title: '¿Cuenta con proveedor?',
                //icon: 'question',
                imageUrl: 'https://reachmx.com/resources/fabrica.png',
                imageHeight: 100,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                reverseButtons: false,
                allowOutsideClick: false,
                allowEscapeKey : false,
                focusConfirm: true
              }).then((result) => {
                $(sel).closest('tr').remove();
                if (result.value) {
                  jQuery.noConflict();
                  $('#formulario').modal('show');
                  $('#prod').hide();
                  $('#prov').show();
                  $('#form_prod').hide();
                  $('#form_prov').show();
                  $('#tit_prod').hide();
                  $('#tit_prov').show();
                  tsi = 1;
                } else if (result.dismiss === "cancel") {
                  jQuery.noConflict();
                  $('#formulario').modal('show');
                  $('#prov').hide();
                  $('#prod').show();
                  $('#form_prov').hide();
                  $('#form_prod').show();
                  $('#tit_prov').hide();
                  $('#tit_prod').show();
                  tsi = 0;
                } else if (result.dismiss == "close") {
                  resetclose();
                }
              });
            //
          }
      });
    },
}

jQuery(document).ready(function () {
  clientes.add_proyecto_base(this);
  clientes.add_arreglo(this);
  clientes.captura_archivo(this);
});