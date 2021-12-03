//Declaración de variables globales
    var idProd_Edit_p = null;
    var i_interno_prod = 0; //variable para id interno de productos proveedor
    var val_done = false; //valida productos
    var val_personalizar = false; //valida frame personalizar (oem)
    var val_proveedor = false; //valida frame proveedor
    var rad_prov; //variable global para saber si esta seleccionado proveedor
    var val_envio = false; //valida el frame de envio
    var pedido = new Array();  //arreglo en el que se guardan los productos sp y proveedores
    var productos_prov = new Array(); //arreglo para guardar los productos prov
    var dataAjax_Proveedores;
    var data_proveedor_cliente = {}; //dos funciones, sirve para el select2 y para agregar nuevos proveedores
    var data_proveedor_cliente2 = new Array();
    var bool_insertadoPrevio = false;
    var id_prov_interno = 1; //variable para control de proveedores en arreglo
    var id_provisional_prov_i;
    var bool_prov_selected = false;
    var name_provisional;
    var name_producto_provisional;
    var cantidad_producto_provisional;
    var unidades_producto_provisional;
    var descripcion_producto_provisional;
    var color_esp_provisional;
    var img_path_edicion_provisional;
    var edicion_cambio_proveedor = false;
    var baseURL = $("#baseURL").val(); // base url para imagenes y vinculos
    var item = ""; //contenedor para los collapsed
    var idProducto = 0; // identificador para los collapsed del producto
    var id_producto = 0; // identificador temporal para ediciones
    var idProd_Edit = 0;
    var reader = new FileReader(); // lector para los archivos
    var imgContProd; // variable de la imagen del producto antes de guardar
    var imgContOEM; // variable de la imagen del logotipo antes de guardar
    var imgContProv; // variable de la imagen de la factura antes de guardar
    var tipoMedida; // variable para el tipo de medida elegido
    var fileNameProd = ""; // variable para el nombre de la imagen del producto en edicion
    var fileNameEspe = ""; // variable para el nombre de la imagen de la personalizacion en edicion
    var fileNameProv = ""; // variable para el nombre de la imagen del proveedor en edicion
    var oemComplete = false; //variable del oem completo, solo una imagen para todas las personalizaciones 
    var envComplete = false; //variable del envio completo
    var comComplete = false; //variable del comentario completo
    // var provCssSelect = 0; // variable para diseño de select proveedor
    var provEdicion = false; // variable para la edicion del proveedor
    var oemEdicion = false; // variable para la edicion de la personalizacion de producto
    var bool_editar_prov = false;
    var cardsPedidos = 0; // varibale para la cantidad de las cards dentro del collapsed
    var frm = $("#agregar_pedido");
    var path_temporal;

    var id_cliente = parseInt($("#idCliente").val());
    var selProv;

    //Variables para imagenes productos_sp
    var arreglo_imagenes = new Array();
    var frmData = new FormData();
    var countimagen = 1;
    var file_Files = " ";
    var file_Files_provicional = " ";
    var pathProd = ""; // variable para el path del producto

    //Variables para imagenes productos_prov
    var arreglo_imagenes_prov = new Array();
    var frmData_prov = new FormData();
    var path_temporal_prov;

    //variables para imagen oem   input_imgOEM
    var frmData_oem = new FormData();
    var file_Files_oem = " ";
    var path_oem_temporal;
    var pathOem = ""; // variable para path de la imagen elegida

    //Variables para archivos invoice
    var arreglo_invoice = new Array();
    var frmData_inv = new FormData();
    var file_Files_invoice = " ";
    var pathProv = ""; // variable para el path del proveedor
    var ext = "";

    // variables globales para la fecha actual
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0");
    var yyyy = today.getFullYear();
    today = yyyy + "-" + mm + "-" + dd;
    todayPrint = dd + "-" + mm + "-" + yyyy;

    // variables para los inputs temporables durante edicion o eliminación
    var inpProd = "";
    var inpCantida = "";
    var inpMedida = "";
    var inpEsp = "";
    var fileProd = "";
    var lblFileProd = "";
    var filePathProd = "";
    var radOEM = "";
    var fileOEM = "";
    var lblFileOEM = "";
    var filePathOEM = "";
    var inpColor = "";
    var radProv = "";
    var inpProv = "";
    var inpContacto = "";
    var inpCorreo = "";
    var inpDireccion = "";
    var inpTelefono = "";
    var inpLada = "";
    var spanLada = "";
    var fileProv = "";
    var lblFileProv = "";
    var filePathProv = "";
    var inpDestino = "";
    var radEnvio = "";
    var inpComentario = "";
    var formProducto = false;
    var formOEM = false;
    var formProveedor = false;
    var formEnvio = false;
    var formComentario = false;
    //
//

// variables para validacion de flechas
    var productoComplete = false;
    var oemCompleto = false;
    var proveedorCompleto = false;
    var envioCompleto = false;
    var comentarioCompelto = false;
//

    function llenadoParcial() {
        inpProd = $("#inpt_form_producto").val();
        inpCantida = $("#inpt_form_cantidad").val();
        inpMedida = $("#selUnidades_prod_sp").val();
        inpEsp = $("#inpt_form_especificaciones").val();
        fileProd = file_Files;
        lblFileProd = fileNameProd;
        filePathProd = pathProd;
        if (inpProd != "" || inpCantida != "" || inpMedida != "" || inpEsp != "" || lblFileProd != "") {
            formProducto = true;
        } else {
            formProducto = false;
        }

        inpColor = $("#inpt_form_colores").val();
        fileOEM = file_Files_oem;
        lblFileOEM = fileNameEspe;
        filePathOEM = pathOem;
        if (inpColor != "" || lblFileOEM != "") {
            formOEM = true;
        } else {
            formOEM = false;
        }

        inpProv = $("#inpt_nombre_proveedor").val();
        inpContacto = $("#inpt_contacto_proveedor").val();
        inpCorreo = $("#inpt_email_proveedor").val();
        inpDireccion = $("#inpt_direccion_proveedor").val();
        inpTelefono = $("#inpt_telefono_proveedor").val();
        inpLada = $("#sel_ladaProv").val();
        spanLada = $("#spLadaProv").html();
        fileProv = file_Files_invoice;
        lblFileProv = fileNameProv;
        filePathProv = pathProv;
        if (inpProv != "" || inpContacto != "" || inpCorreo != "" || inpDireccion != "" 
        || inpTelefono != "" || inpLada != 0 || spanLada != "" || lblFileProv != "") {
            formProveedor = true;
        } else {
            formProveedor = false;
        }
        
        inpDestino = $("#inpt_form_destinoEntrega").val();
        if (inpDestino != "") {
            formEnvio = true;
        } else {
            formEnvio = false;
        }

        inpComentario = $("#inpt_comentarios").val();
        if (inpComentario != "") {
            formComentario = true;
        } else {
            formComentario = false;
        }
    }

    function pasoActual() {
        var stepActivo = $("#txtStepActivo").val();
        $("#txtStepForm").val(stepActivo);
        
        //este if es para que en el caso de no estar en el paso 1 pero exista imagen 
        //se devuelva a la variable que corresponde y funcione en el submit o agregarmas
        if (fileProd != "") {
            file_Files = fileProd;  
        }

        //este if es para que en el caso de no estar en el paso 3 pero ya se haya seleccionado
        // retorne los valores para poder obtenerlos en el submit o agregarmas
        if (formProveedor == true) {
            $("#radioProvSi").attr("value", "true");
            $("#radioProvNo").attr("value", "false");
            $("#radioProvSi").prop('checked', true);
            $("#radioProvNo").prop('checked', false);
            $("#container-prov").css("display", "");
            rad_prov = "Si";
            // recore las opciones dentro del select2 del proveedor para ver cual era el valor anterior a la edicion de un producto diferente
            $("#inpt_nombre_proveedor option").each(function () {
                var text = $(this).text();
                var val = $(this).val();
                if (inpProv == text || inpProv == val) {
                    $("#inpt_nombre_proveedor option[value='" + $(this).val() + "']").attr("selected", "selected");
                    $("#select2-inpt_nombre_proveedor-container").html('<span class="select2-selection__clear" title="Remove all items">×</span>' + text);
                } else {
                    $("#inpt_nombre_proveedor option[value='" + $(this).val() + "']").removeAttr("selected");
                }
            });

            //esto se pone aqui para que en el caso de no estar en el paso pero exista invoice
            //se devuelva a la variable que corresponde y funcione en el submit o agregarmas
            file_Files_invoice = fileProv;
            fileNameProv = lblFileProv;
            pathProv = filePathProv;
            if (fileProv != " ") {
                $("#inputFactura").attr("disabled", "true");
                $("#cancelFactura").removeAttr("disabled");
                $("#lblFactura").removeClass("file-placeholder");
                $("#lblFactura").html(lblFileProv);
                $("#fileNameProv").html(lblFileProv);
            } else {
                $("#inputFactura").removeAttr("disabled");
                $("#cancelFactura").attr("disabled", "true");
                $("#lblFactura").addClass("file-placeholder");
                $("#lblFactura").html("Seleccionar una foto");
                $("#fileNameProv").html("");;
            }

            //este if es para en el caso que este seleccionado un proveedor del array y que no lo
            //vuelva a agregar
            var id_selected_value = $('#inpt_nombre_proveedor').val();
            var id_selected = parseInt(id_selected_value);
            if (parseInt(id_selected, 10)) {
                bool_prov_selected = true;
            }            
        }else {
            proveedorCompleto = false;
        }
        if (stepActivo == 1) {
            funcSetp1();
            if (formProducto == true) {
                $("#inpt_form_producto").val(inpProd);
                $("#inpt_form_cantidad").val(inpCantida);
                $("#selUnidades_prod_sp").val(inpMedida);
                $("#inpt_form_especificaciones").val(inpEsp);
                file_Files = fileProd;
                fileNameProd = lblFileProd;
                pathProd = filePathProd;
                if (fileProd != " ") {
                    $("#filesImgProd").attr("disabled", "true");
                    $("#cancelImgProd").removeAttr("disabled");
                    $("#lblImgProducto").removeClass("file-placeholder");
                    $("#lblImgProducto").html(lblFileProd);
                    $("#fileNameProd").html(lblFileProd);
                } else {
                    $("#filesImgProd").removeAttr("disabled");
                    $("#cancelImgProd").attr("disabled", "true");
                    $("#lblImgProducto").addClass("file-placeholder");
                    $("#lblImgProducto").html("Seleccionar una foto");
                    $("#fileNameProd").html("");
                }
                $("#btnEditProd").css("display", "none");
                $("#btnAgregarProd").css("display", "");
            }
        } else if (stepActivo == 2) {
            funcSetp2();
            if (formOEM == true) {
                $("#inpt_form_colores").val(inpColor);
                $("#iconColor").css("color", inpColor);
                if (radOEM == "Si") {
                    $("#radioProdSi").prop('checked', true);
                    $("#radioProdSi").is(":checked");
                } else if (radOEM == "No") {
                    $("#radioProdNo").prop('checked', true);
                    $("#radioProdSi").is(":checked");
                }
                file_Files_oem = fileOEM;
                fileNameEspe = lblFileOEM;
                filePathOEM = pathOem;
                if (fileOEM != " ") {
                    $("#filesOEM").attr("disabled", "true");
                    $("#cancelOEM").removeAttr("disabled");
                    $("#lblLogotipo").removeClass("file-placeholder");
                    $("#lblLogotipo").html(lblFileOEM);
                    $("#fileNameEspe").html(lblFileOEM);
                } else {
                    $("#filesOEM").removeAttr("disabled");
                    $("#cancelOEM").attr("disabled", "true");
                    $("#lblLogotipo").addClass("file-placeholder");
                    $("#lblLogotipo").html("Seleccionar una foto");
                    $("#fileNameEspe").html("");
                }
                $("#btnEditEspP").css("display", "none");
                $("#btnAgregarEspP").css("display", "");
            }
        } else if (stepActivo == 3) {
            funcSetp3();
            $("#container-prov").css("display", "");
            $("#inpt_contacto_proveedor").val(inpContacto);
            $("#inpt_email_proveedor").val(inpCorreo);
            $("#inpt_direccion_proveedor").val(inpDireccion);
            $("#inpt_telefono_proveedor").val(inpTelefono);
            $("#sel_ladaProv").val(inpLada);
            $("#spLadaProv").html(spanLada);

            $("#btnEditProv").css("display", "none");
            $("#btnAgregarProv").css("display", "");
        } else if (stepActivo == 4) {
            if (envComplete == false && comComplete == false) {
                funcSetp4();
                if (formEnvio == true) {
                    $("#inpt_form_destinoEntrega").val(inpDestino);
                    if (radEnvio == "Maritimo") {
                        $("#rad_maritimo").prop('checked', true);
                        $("#rad_maritimo").is(":checked");
                    } else if (aire == "Aereo") {
                        $("#rad_aereo").prop('checked', true);
                        $("#rad_aereo").is(":checked");
                    }
                    $("#btnEditEnv").css("display", "none");
                    $("#btnAgregarEnvio").css("display", "");
                }
            } else if (envComplete == true && comComplete == false) {
                funcSetp5();
                if (formComentario == true) {
                    $("#inpt_comentarios").val(inpComentario);
                    $("#btnEditCom").css("display", "none");
                    $("#btnAgregarCom").css("display", "");
                }
            } else if (envComplete == true && comComplete == true) {
                funcSetp6();
            }
        } else if (stepActivo == 5) {
            if (envComplete == false && comComplete == false) {
                funcSetp4();
                if (formEnvio == true) {
                    $("#inpt_form_destinoEntrega").val(inpDestino);
                    if (radEnvio == "Maritimo") {
                        $("#rad_maritimo").prop('checked', true);
                        $("#rad_maritimo").is(":checked");
                    } else if (aire == "Aereo") {
                        $("#rad_aereo").prop('checked', true);
                        $("#rad_aereo").is(":checked");
                    }
                    $("#btnEditEnv").css("display", "none");
                    $("#btnAgregarEnvio").css("display", "");
                }
            } else if (envComplete == true && comComplete == false) {
                funcSetp5();
                if (formComentario == true) {
                    $("#inpt_comentarios").val(inpComentario);
                    $("#btnEditCom").css("display", "none");
                    $("#btnAgregarCom").css("display", "");
                }
            } else if (envComplete == true && comComplete == true) {
                funcSetp6();
            }
        } else if (stepActivo == 6) {
            funcSetp6();
        }
        idProd_Edit_p = null;
    }
    //funcion para ocultar las flechas de movimiento al darle click en cualquier parte del formulario ya completo
    function flechasOnCLick() {
        var step = $("#txtStepForm").val();
        if ((step == 1 && productoComplete == true) ||
         (step == 2 && oemCompleto == true) ||
          (step == 3 && proveedorCompleto == true) ||
           (step == 4 && envioCompleto == true) ||
            (step == 5 && comentarioCompelto == true)) {
            $("#moveArrows").css("display", "none");
            $("#arrowNext").css("display", "none");
            $("#arrowBack").css("display", "none");
        }
    }
    //funcion para ocultar las flechas de movimiento al editar
    function flechas() {
        $("#moveArrows").css("display", "none");
        $("#arrowNext").css("display", "none");
        $("#arrowBack").css("display", "none");
    }

//Funciones (validaciones etc)
    // funcion para agregar comas separadoras a un numero
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }

    //Validaciones para continuar
    //Funcion para la validacion de los campos de producto
    function Validacion_producto_f1() {
        //Declaracion de variables
        var nombre_prod_sp = $("#inpt_form_producto").val();
        var cantidad_prod_sp = $("#inpt_form_cantidad").val();
        var unidades_prod_sp = $("#selUnidades_prod_sp").val();
        var especif_prod_sp = $("#inpt_form_especificaciones").val();

        //validar nombre_prod_sp
        if (nombre_prod_sp != "") {
            $("#div_val_nombre_prod_sp").css("display", "none");
            $("#inpt_form_producto").removeClass("invalid");
            $("#inpt_form_producto").addClass("valid");
        } else {
            $("#div_val_nombre_prod_sp").css("display", "block");
            $("#inpt_form_producto").addClass("invalid");
            $("#inpt_form_producto").removeClass("valid");
        }
        //validar cantidad_prod_sp
        if (cantidad_prod_sp != "") {
            $("#div_val_cantidad_prod_sp").css("display", "none");
            $("#inpt_form_cantidad").removeClass("invalid");
            $("#inpt_form_cantidad").addClass("valid");
        } else {
            $("#div_val_cantidad_prod_sp").css("display", "block");
            $("#inpt_form_cantidad").addClass("invalid");
            $("#inpt_form_cantidad").removeClass("valid");
        }
        if (unidades_prod_sp == 0) {
            $("#div_val_selUnidades_prod_sp").css("display", "block");
            $("#selUnidades_prod_sp").addClass("invalid");
            $("#selUnidades_prod_sp").removeClass("valid");
        } else {
            $("#div_val_selUnidades_prod_sp").css("display", "none");
            $("#selUnidades_prod_sp").removeClass("invalid");
            $("#selUnidades_prod_sp").addClass("valid");
        }
        //validar especif_prod_sp
        if (especif_prod_sp != "") {
            $("#div_val_especif_prod_sp").css("display", "none");
            $("#inpt_form_especificaciones").removeClass("invalid");
            $("#inpt_form_especificaciones").addClass("valid");
        } else {
            $("#div_val_especif_prod_sp").css("display", "block");
            $("#inpt_form_especificaciones").addClass("invalid");
            $("#inpt_form_especificaciones").removeClass("valid");
        }
        // validar todas las validaciones anteriror juntas
        if (
            (nombre_prod_sp && cantidad_prod_sp && especif_prod_sp) != "" &&
            unidades_prod_sp != 0
        ) {
            val_done = true;
        } else {
            val_done = false;
        }
    }
    //Funcion para la validacion de los campos de personalizacion
    function Validacion_personalizar_f2() {
        var rad_oem = $("#radioProdSi").val();
        var rad_oemNo = $("#radioProdNo").val();
        var color_oem = $("#inpt_form_colores").val();
        // validar si la opcion de personalizar es si
        if (rad_oem == "true") {
            $("#div_val_radio_personalizar").css("display", "none");
            // validar el archivo de la imagen
            if (file_Files_oem != " ") {
                $("#div_val_logo_oem").css("display", "none");
                $("#filesOEM").removeClass("invalid");
                $("#filesOEM").addClass("valid");
                $("#lblLogotipo").removeClass("invalid");
                $("#lblLogotipo").addClass("valid");
                $("#cancelOEM").removeClass("invalid");
                $("#cancelOEM").addClass("valid");
            } else {
                $("#div_val_logo_oem").css("display", "block");
                $("#filesOEM").addClass("invalid");
                $("#filesOEM").removeClass("valid");
                $("#lblLogotipo").addClass("invalid");
                $("#lblLogotipo").removeClass("valid");
                $("#cancelOEM").addClass("invalid");
                $("#cancelOEM").removeClass("valid");
            }

            if (color_oem == "") {
                $("#div_val_color").css("display", "block");
                $("#inpt_form_colores").addClass("invalid");
                $("#inpt_form_colores").removeClass("valid");
                $("#spColor").addClass("invalid");
                $("#spColor").removeClass("valid");
            } else {
                $("#div_val_color").css("display", "none");
                $("#inpt_form_colores").removeClass("invalid");
                $("#inpt_form_colores").addClass("valid");
                $("#spColor").removeClass("invalid");
                $("#spColor").addClass("valid");
            }

            if (file_Files_oem != " " && color_oem != "") {
                val_personalizar = true;
            } else {
                val_personalizar = false;
            }
        } else if (rad_oem == "false" && rad_oemNo == "false") {
            //si no se ha elegido ningun radio
            $("#div_val_radio_personalizar").css("display", "block");
            $("#lblProdSi").css("color", "#dc3545");
            $("#lblProdNo").css("color", "#dc3545");
            val_personalizar = false;
        }
    }
    //Funcion para la validacion de los campos de proveedor
    function Validacion_proveedor_f3() {
        var rad_provSi = $("#radioProvSi").val();
        var rad_provNo = $("#radioProvNo").val();
        if (rad_provSi == "true") {
            rad_prov = "Si";
            $("#div_val_radio_proveedor").css("display", "none");
            var nombre_prov = $("#inpt_nombre_proveedor").val();
            var email = $("#inpt_email_proveedor").val();
            var contacto = $("#inpt_contacto_proveedor").val();
            // validar proveedor nombre
            if (nombre_prov != "") {
                $("#div_val_nombre_prov").css("display", "none");
                $("#inpt_prov_select").removeClass("invalid");
                $("#inpt_prov_select").addClass("valid");
            } else if (nombre_prov == "") {
                $("#div_val_nombre_prov").css("display", "block");
                $("#inpt_prov_select").addClass("invalid");
                $("#inpt_prov_select").removeClass("valid");
            }
            //validar email
            if (email != "") {
                $("#div_val_email_prov").css("display", "none");
                $("#inpt_email_proveedor").removeClass("invalid");
                $("#inpt_email_proveedor").addClass("valid");
                // validar correo valido
                if (/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) {
                    $("#div_val_email_formt_prov").css("display", "none");
                    $("#inpt_email_proveedor").removeClass("invalid");
                    $("#inpt_email_proveedor").addClass("valid");
                } else if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)) {
                    $("#div_val_email_formt_prov").css("display", "block");
                    $("#inpt_email_proveedor").addClass("invalid");
                    $("#inpt_email_proveedor").removeClass("valid");
                }
            } else if (email == "") {
                $("#div_val_email_prov").css("display", "block");
                $("#inpt_email_proveedor").addClass("invalid");
                $("#inpt_email_proveedor").removeClass("valid");
            }
            //validar contacto
            if (contacto != "") {
                $("#div_val_contacto_prov").css("display", "none");
                $("#inpt_contacto_proveedor").removeClass("invalid");
                $("#inpt_contacto_proveedor").addClass("valid");
            } else if (contacto == "") {
                $("#div_val_contacto_prov").css("display", "block");
                $("#inpt_contacto_proveedor").addClass("invalid");
                $("#inpt_contacto_proveedor").removeClass("valid");
            }

            if (
                (nombre_prov && email && contacto) != "" &&
                email != "" &&
                /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(email)
            ) {
                val_proveedor = true;
            } else {
                val_proveedor = false;
            }
        } else if (rad_provNo == "false") {
            rad_prov = "No";
        } else if (rad_provSi == "false" && rad_provNo == "false") {
            val_proveedor = false;
            $("#div_val_radio_proveedor").css("display", "block");
            $("#lblProvSi").css("color", "#dc3545");
            $("#lblProvNo").css("color", "#dc3545");
        }
    }
    //Funcion para la validacion de los campos de envio
    function Validacion_envio_f4() {
        var destino = $("#inpt_form_destinoEntrega").val();
        var tipoM = $("#rad_maritimo").val();
        var tipoA = $("#rad_aereo").val();
        var llenado_envio = false;

        if (destino != "") {
            $("#div_val_destino_pb").css("display", "none");
            $("#inpt_form_destinoEntrega").removeClass("invalid");
            $("#inpt_form_destinoEntrega").addClass("valid");
        } else if (destino == "") {
            $("#div_val_destino_pb").css("display", "block");
            $("#inpt_form_destinoEntrega").addClass("invalid");
            $("#inpt_form_destinoEntrega").removeClass("valid");
        }

        //si no hay ninguno seleccionado
        if ((tipoM == "false") & (tipoA == "false")) {
            $("#div_val_radio_pb").css("display", "block");
            $("#lblMaritimo").css("color", "#dc3545");
            $("#lblAereo").css("color", "#dc3545");
            llenado_envio = false;
        } else {
            //oculta el div de los radios
            $("#div_val_radio_pb").css("display", "none");
            $("#lblMaritimo").css("color", "#5b6670");
            $("#lblAereo").css("color", "#5b6670");
            llenado_envio = true;
        }

        if (destino != "" && llenado_envio == true) {
            val_envio = true;
        } else {
            val_envio = false;
            $("#div_val_radio_pb").css("display", "none");
            $("#lblMaritimo").css("color", "#dc3545");
            $("#lblAereo").css("color", "#dc3545");
        }
    }

    // Funciones de los formularios de los pasos del pedido
    // funcion del formulario exitoso
    function funcExito() {
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#txtStepActivo").val("1");
        $("#txtStepForm").val("1");
        $("#iconTitle").html('<i class="fas fa-check title-color"></i>');
        $("#textTitel").html("Pedido realizado con éxito.");
        $("#progressForm").css("display", "none");
        $("#numProgress").html("100% progreso");
        $("#barProgress").css("width", "100%");
        $("#container-subtitle").html("");
        $("#container-pedido").css("display", "none");
        $("#step1").css("display", "none");
        $("#step2").css("display", "none");
        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        $("#step5").css("display", "none");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "none");
        $("#container-final").css("display", "");
        $("#moveArrows").css("display", "none");
        $("#arrowNext").css("display", "none");
        $("#arrowBack").css("display", "none");
    }
    // funcion del formulario del paso 1
    function funcSetp1() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="fas fa-shopping-bag title-color"></i>');
        $("#textTitel").html("Cuéntanos de tu producto.");
        $("#container-subtitle").html("Agrega el producto que deseas importar.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "");
        $("#step2").css("display", "none");
        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        $("#step5").css("display", "none");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "");
        if (Step > "1") {
            $("#moveArrows").css("display", "");
            $("#arrowNext").css("display", "");
            $("#arrowBack").css("display", "none");
        } else {
            $("#moveArrows").css("display", "none");
            $("#arrowNext").css("display", "none");
            $("#arrowBack").css("display", "none");
        }
    }
    // funcion del formulario del paso 2
    function funcSetp2() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="fas fa-shopping-bag title-color"></i>');
        $("#textTitel").html("Cuéntanos de tu producto.");
        $("#container-subtitle").html("Perzonaliza tu producto.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "none");
        $("#step2").css("display", "");
        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        $("#step5").css("display", "none");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "");
        $("#moveArrows").css("display", "");
        $("#arrowBack").css("display", "");
        if (Step > "2") {
            $("#arrowNext").css("display", "");
        } else {
            $("#arrowNext").css("display", "none");
        }
    }
    // funcion del formulario del paso 3
    function funcSetp3() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="fas fa-shopping-bag title-color"></i>');
        $("#textTitel").html("Cuéntanos de tu producto.");
        $("#container-subtitle").html("Tu producto tiene proveedor.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "none");
        $("#step2").css("display", "none");
        $("#step3").css("display", "");
        $("#step4").css("display", "none");
        $("#step5").css("display", "none");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "");
        $("#moveArrows").css("display", "");
        $("#arrowBack").css("display", "");
        $(".select2-selection--single").attr("id", "inpt_prov_select");
        $(".select2-selection__clear").attr("id", "inpt_prov_clean");
        if (Step > "3") {
            $("#arrowNext").css("display", "");
        } else {
            $("#arrowNext").css("display", "none");
        }
    }
    // funcion del formulario del paso 4
    function funcSetp4() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="fas fa-ship title-color"></i>');
        $("#textTitel").html("Sobre el envío.");
        $("#container-subtitle").html("A donde llevaremos tu producto.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "none");
        $("#step2").css("display", "none");
        $("#step3").css("display", "none");
        $("#step4").css("display", "");
        $("#step5").css("display", "none");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "");
        $("#moveArrows").css("display", "");
        $("#arrowBack").css("display", "");
        if (Step > "4") {
            $("#arrowNext").css("display", "");
        } else {
            $("#arrowNext").css("display", "none");
        }
    }
    // funcion del formulario del paso 5
    function funcSetp5() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="far fa-comment-dots title-color"></i>');
        $("#textTitel").html("Comentarios.");
        $("#container-subtitle").html("Algo mas que desea agregar.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "none");
        $("#step2").css("display", "none");
        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        $("#step5").css("display", "");
        $("#step6").css("display", "none");
        $(".container-button").css("display", "");
        $("#moveArrows").css("display", "");
        $("#arrowBack").css("display", "");
        if (Step > "5") {
            $("#arrowNext").css("display", "");
        } else {
            $("#arrowNext").css("display", "none");
        }
    }
    // funcion del formulario del paso 6
    function funcSetp6() {
        var Step = $("#txtStepActivo").val();
        // modificar los elementos de acuerdo al paso donde se encuentran
        $("#iconTitle").html('<i class="fas fa-check title-color"></i>');
        $("#textTitel").html("Verifica la información.");
        $("#container-subtitle").html("Estas listo para realizar tu pedido.");
        $("#container-pedido").css("display", "");
        $("#step1").css("display", "none");
        $("#step2").css("display", "none");
        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        $("#step5").css("display", "none");
        $("#step6").css("display", "");
        $(".container-button").css("display", "none");
        $("#moveArrows").css("display", "");
        $("#arrowBack").css("display", "");
        $("#arrowNext").css("display", "none");
    }
    // funcion de la creacion del collapsed y llenado del producto
    function collapsed() {
        item =
            '<li class="list-group-item" id="cardProducto' + idProducto + '">' +
                '<div id="heading' + idProducto + '" style="padding: 0;">' +
                    '<ul class="list-group">' +
                        '<li class="list-group-item d-flex justify-content-between align-items-center collapsed collAction' + idProducto + '" data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="true">' +
                            '<a class="colProds prod-title collapsed collAction' + idProducto + '" data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="true">' +
                                '<span id="txtProducto' + idProducto + '"></span>' +
                                '</a>' +
                            '<span>' +
                                '<a type="button" class="btnEliminar" id="btnEliminarProd" data-id="' + idProducto + '"><i class="far fa-trash-alt"></i></a>' +
                            '</span>' +
                        '</li>' +
                    '</ul>' +
                '</div>' +
                '<div id="collapse' + idProducto + '" class="collapse show" aria-labelledby="heading' + idProducto + '">' +
                    '<div class="card-body overflow-auto" style="padding: 6px 0px 6px 0px;">' +
                        '<ul class="list-group list-group-flush">' +
                            '<li class="list-group-item list-Pedido" id="listProducto">' +
                                '<p class="list-Title">' +
                                    '<strong>Datos del producto</strong>' +
                                    '<a href type="button" id="btnEditarProd" data-id="' + idProducto + '" class="edits-btns">' +
                                        '<i class="far fa-edit"></i>' +
                                    '</a>' +
                                '</p>' +
                                '<p class="list-Content"><strong>Producto: </strong><label class="m-0 font-w" id="txtNombProd' + idProducto + '"></label></p>' +
                                '<p class="list-Content"><strong>Cantidad: </strong>' +
                                    '<label class="m-0 font-w" id="txtCantidad' + idProducto + '"></label>&nbsp;' +
                                    '<label class="m-0 font-w" id="txtTipoMedida' + idProducto + '"></label>' +
                                    '<label class="m-0 font-w" id="txtMedida' + idProducto + '" style="display: none"></label>' +
                                    '</p>' +
                                '<p class="list-Content"><strong>Especificaciones: </strong><label class="m-0 font-w" id="txtEspecif' + idProducto + '"></label></p>' +
                                '<p class="list-Content" id="contImgProd' + idProducto + '" style="display: none"><strong>Fotos: </strong>' +
                                    '<a href="" id="imgProducto' + idProducto + '" class="linkProducto" data-id="' + idProducto + '"></a>' +
                                '</p>' +
                                '<p class="list-Content" id="fileNameProd' + idProducto + '" style="display: none"></p>' +
                            '</li>' +
                            '<li class="list-group-item list-Pedido" id="listPerzonalizar' + idProducto + '" style="display: none">' +
                                '<p class="list-Title">' +
                                    '<strong>Personalización de tu producto</strong>' +
                                    '<a type="button" class="edits-btns" id="btnEditarPerso" data-id="' + idProducto + '">' +
                                        '<i class="far fa-edit"></i>' +
                                    '</a>' +
                                '</p>' +
                                '<input type="hidden" id="valRadioProd" value="">' +
                                '<p class="list-Content" id="pNoPersonalizado' + idProducto + '" style="display: none"><strong>Ninuna personalización agregada</strong></p>' +
                                '<p class="list-Content" id="pLogotipo' + idProducto + '" style="display: none"><strong>Logotipo: </strong>' +
                                    '<a href="" id="imgLogotipo' + idProducto + '" class="linkOEM" data-id="' + idProducto + '"></a>' +
                                '</p>' +
                                '<p class="list-Content" id="fileNameOem" style="display: none"></p>' +
                                '<p class="list-Content" id="pColors' + idProducto + '" style="display: none"><strong>Color: </strong><label class="m-0 font-w" id="txtColor' + idProducto + '"></label>&nbsp;&nbsp;<i class="fas fa-circle" id="iColor' + idProducto + '"></i></p>' +
                            '</li>' +
                            '<li class="list-group-item list-Pedido" id="listProveedor' + idProducto + '" style="display: none">' +
                                '<p class="list-Title">' +
                                    '<strong>Datos del proveedor</strong>' +
                                    '<a type="button" class="edits-btns" id="btnEditarProv" data-id="' + idProducto + '">' +
                                        '<i class="far fa-edit"></i>' +
                                    '</a>' +
                                '</p>' +
                                '<input type="hidden" id="valRadioProv" value="">' +
                                '<p class="list-Content" id="pNoProveedor' + idProducto + '" style="display: none"><strong>Producto sin proveedor</strong></p>' +
                                '<p class="list-Content" id="pProveedor' + idProducto + '" style="display: none"><strong>Proveedor: </strong><label class="m-0 font-w nameProveedor" id="txtProveedor' + idProducto + '" data-id="' + idProducto + '"></label></p>' +
                                '<p class="list-Content" id="pPersona' + idProducto + '" style="display: none"><strong>Persona Contacto: </strong><label class="m-0 font-w" id="txtContacto' + idProducto + '"></label></p>' +
                                '<p class="list-Content" id="pCorreo' + idProducto + '" style="display: none"><strong>Correo: </strong><label class="m-0 font-w" id="txtCorreo' + idProducto + '"></label></p>' +
                                '<p class="list-Content" id="pTelefono' + idProducto + '" style="display: none"><strong>Teléfono: </strong>' +
                                    '<label class="m-0 font-w" id="txtLada' + idProducto + '"></label> ' +
                                    '<label class="m-0 font-w" id="txtTelefono' + idProducto + '"></label>' +
                                    '<label class="m-0 font-w" id="txtLadaVal' + idProducto + '" style="display: none"></label>' +
                                    '</p>' +
                                '<p class="list-Content" id="pDireccion' + idProducto + '" style="display: none"><strong>Liga página: </strong><label class="m-0" id="txtDireccion' + idProducto + '"></label></p>' +
                                '<p class="list-Content" id="pFactura' + idProducto + '" style="display: none"><strong>No. de factura: </strong>' +
                                    '<a id="imgFactura' + idProducto + '" class="linkProveedor" data-id="' + idProducto + '"></a>' +
                                '</p>' +
                                '<p class="list-Content" id="fileNameProv' + idProducto + '" style="display: none"></p>' +
                            '</li>' +
                        '</ul>' +
                    '</div>' +
                '</div>' +
            '</li>';
        $('#accordionItems').append(item);
        $('#conten-productos').removeClass('d-flex-partial cont-inicio');
        $('#listaProductos').css('display', '');
        $('#incioProductos').css('display', 'none');
        if (idProducto != 1) {
            var id = idProducto - 1;
            $("#cardProducto" + id + "").addClass('border-list-prod');
        }
        llenadoProducto(idProducto);
        cardsPedidos++;
    }
    // funcion del llenado de la personalizacion del producto
    function llenadoProducto(id) {
        id_producto = id;
        var producto = $("#inpt_form_producto").val();
        var cantidad = $("#inpt_form_cantidad").val();
        var unidadMe = $("#selUnidades_prod_sp").val();
        var especif = $("#inpt_form_especificaciones").val();
        var fileNameBefor = $("#fileNameProd" + id_producto + "").html();
        var fileNameInput = $("#lblImgProducto").html();
        var pathBefore = $("#imgProductoFile"+id_producto+"").attr('src');
        $('#txtProducto' + id_producto + '').html(producto);
        $('#txtNombProd' + id_producto + '').html(producto);
        $('#txtCantidad' + id_producto + '').html(cantidad + ' ');
        $('#txtTipoMedida' + id_producto + '').html(tipoMedida);
        $('#txtMedida' + id_producto + '').html(unidadMe);
        $('#txtEspecif' + id_producto + '').html(especif);
        $('#imgProducto' + id_producto + '').html('');
        if (file_Files != " " || file_Files_provicional != " ") {
            if (fileNameBefor != fileNameInput) {
                imgContProd = '<img id="imgProductoFile'+id_producto+'" src="' + pathProd + '" style="width: 20%;" />';
                var fil = file_Files;
                console.log(file_Files);
                console.log(fil);
                $("#imgProducto" + id_producto + "").append(imgContProd);
                $("#fileNameProd" + id_producto + "").html(fileNameProd);
                $("#filsProd" + id_producto + "").html(fil);
                $("#filesProd" + id_producto + "").html(fil);
                $("#fileProd" + id_producto + "").append(fil);
                $("#fileProd" + id_producto + "").html(fil);
                $("#filProd" + id_producto + "").attr('href', fil);
                $('#contImgProd' + id_producto + '').css('display', '');
            } else if (pathBefore == pathProd) {
                imgContProd = '<img id="imgProductoFile'+id_producto+'" src="' + pathProd + '" style="width: 20%;" />';
                $("#imgProducto" + id_producto + "").append(imgContProd);
                $("#fileNameProd" + id_producto + "").html(fileNameProd);
            } else {
                imgContProd = '<img id="imgProductoFile'+id_producto+'" src="' + pathBefore + '" style="width: 20%;" />';
                $("#imgProducto" + id_producto + "").append(imgContProd);
                $("#fileNameProd" + id_producto + "").html(fileNameBefor);
            }
        } else {
            if (fileNameBefor != fileNameInput) {
                $('#contImgProd' + id_producto + '').css('display', 'none');
                $("#fileNameProd" + id_producto + "").html('');
                $("#imgProductoFile" + id_producto + "").remove();
            } else if (pathBefore == pathProd) {
                imgContProd = '<img id="imgProductoFile'+id_producto+'" src="' + pathProd + '" style="width: 20%;" />';
                $("#imgProducto" + id_producto + "").append(imgContProd);
                $("#fileNameProd" + id_producto + "").html(fileNameProd);
            } else {
                imgContProd = '<img id="imgProductoFile'+id_producto+'" src="' + pathBefore + '" style="width: 20%;" />';
                $("#imgProducto" + id_producto + "").append(imgContProd);
                $("#fileNameProd" + id_producto + "").html(fileNameBefor);
            }
        }
    }
    // funcion del llenado de la personalizacion del producto
    function llenadoPersonalizar(id) {
        id_producto = id;
        var color = $("#inpt_form_colores").val();
        $("#listPerzonalizar" + id_producto + "").css("display", "");
        $("#pColors" + id_producto + "").css("display", "");
        $("#iColor" + id_producto + "").css('color', color);
        $("#txtColor" + id_producto + "").html(color);
        $("#imgLogotipo" + id_producto + "").html('');
        if (file_Files_oem != " ") {
            imgContOEM = '<img id="imgLogotipoFile" src="' + pathOem + '" style="width: 20%;" />';
            $("#imgLogotipo" + id_producto + "").append(imgContOEM);
            $("#pLogotipo" + id_producto + "").css("display", "");
            $("#fileNameOem").html(fileNameEspe);
        } else {
            $("#pLogotipo" + id_producto + "").css("display", "none");
        }
    }
    // funcion del llenado del proveedor
    function llenadoProveedor(id) {
        id_producto = id;
        var prov = $("#inpt_nombre_proveedor option:selected").text();
        var email = $("#inpt_email_proveedor").val();
        var contacto = $("#inpt_contacto_proveedor").val();
        var idLada = $("#sel_ladaProv").val();
        var lada = $("#spLadaProv").html();
        var telefono = $("#inpt_telefono_proveedor").val();
        var direccion = $("#inpt_direccion_proveedor").val();

        $("#listProveedor" + id_producto + "").css("display", "");
        $("#pProveedor" + id_producto + "").css("display", "");
        $("#pPersona" + id_producto + "").css("display", "");
        $("#pCorreo" + id_producto + "").css("display", "");
        $("#txtProveedor" + id_producto + "").html(prov);
        $("#txtContacto" + id_producto + "").html(contacto);
        $("#txtCorreo" + id_producto + "").html(email);


        if (telefono != "") {
            $("#pTelefono" + id_producto + "").css("display", "");
            $("#txtLada" + id_producto + "").html(lada);
            $("#txtTelefono" + id_producto + "").html(telefono);
            $("#txtLadaVal" + id_producto + "").html(idLada);
        } else {
            $("#pTelefono" + id_producto + "").css("display", "none");
            $("#txtLada" + id_producto + "").html('');
            $("#txtTelefono" + id_producto + "").html('');
            $("#txtLadaVal" + id_producto + "").html('');
        }

        if (direccion != "") {
            var liga = '<a href="' + direccion + '">' + direccion + '</a>';
            $("#pDireccion" + id_producto + "").css("display", "");
            $("#txtDireccion" + id_producto + "").html(liga);
        } else {
            $("#pDireccion" + id_producto + "").css("display", "none");
            $("#txtDireccion" + id_producto + "").html('');
        }

        if (pathProv != "") {
            $("#imgFactura" + id_producto + "").empty();
            if (ext == "jpg" || ext == "jpeg" || ext == "png" || ext == "JPG" || ext == "JPEG" || ext == "PNG") {
                imgContProv = '<i class="far fa-images"></i>';
                $("#imgFactura" + id_producto + "").attr('href', pathProv);
                
                // imgContProv = '<img id="imgFacturaFile" src="' + pathProv + '" style="width: 20%;" />';
            } else if (ext == "xlsx" || ext == "xls" || ext == "XLSX" || ext == "XLS") {
                imgContProv = '<i class="far fa-file-excel excel-icon"></i>';
                $("#imgFactura" + id_producto + "").attr('href', pathProv);
                $("#imgFactura" + id_producto + "").attr('download');
            } else if (ext == "pdf" || ext == "PDF") {
                imgContProv = '<i class="far fa-file-pdf pdf-icon"></i>';
                $("#imgFactura" + id_producto + "").attr('href', pathProv);
            }
            $("#pFactura" + id_producto + "").css("display", "");
            $("#imgFactura" + id_producto + "").append(imgContProv);
            $("#fileNameProv" + id_producto + "").html(fileNameProv);
        } else {
            $("#pFactura" + id_producto + "").css("display", "none");
            $("#imgFactura" + id_producto + "").empty('');
            $("#fileNameProv" + id_producto + "").html('');
            $("#imgFactura" + id_producto + "").attr('href', '');
        }
    }
    // funcion del llenado de envio
    function llenadoEnvio() {
        var destino = $("#inpt_form_destinoEntrega").val();
        var tipoMar = $("#rad_maritimo").val();
        var tipoAire = $("#rad_aereo").val();
        $("#listEnvio").css("display", "");
        $("#lblDestino").html(destino);
        if (tipoMar == "true" && tipoAire == "false") {
            $("#lblEmpaque").html("Marítimo");
            tipo_enviovar = 'Maritimo';
        } else {
            $("#lblEmpaque").html("Áereo");
            tipo_enviovar = 'Aereo';
        }
        envComplete = true;
    }
    // funcion del llenado del comentario
    function llenadoComentario() {
        var coment = $("#inpt_comentarios").val();
        if (coment != "") {
            $("#listComents").css("display", "");
            $("#pComentario").css("display", "");
            $("#lblComentario").html(coment);
            comComplete = true;
        }
    }
    //funcion para resetear el formulario
    function reset_formulario() {
        //Reset de formulario
        document.getElementById("agregar_pedido").reset();

        if (Object.keys(data_proveedor_cliente).length != 0) {
            //selProv.empty();
            selProv.select2({
                data: data_proveedor_cliente2,
                tags: true,
                placeholder: "Nombre del proveedor",
                selectOnClose: true,
                closeOnSelect: true,
                allowClear: true,
            });
        }
        selProv.val(null).trigger("change");

        path_temporal = " ";
        path_temporal_prov = " ";

        //reset variable file
        if (file_Files != " ") {
            file_Files = " ";
            $("#filesImgProd").val("");
            $("#filesImgProd").removeAttr("disabled");
            $("#cancelImgProd").attr("disabled", "true");
            $("#lblImgProducto").html("Seleccionar una foto");
            $("#lblImgProducto").addClass("file-placeholder");
            fileNameProd = "";
            imgContProd = "";
        }
        if (file_Files_oem != " ") {
            var fName = $("#fileNameEspe").html();
            $("#filesOEM").attr("disabled", "true");
            $("#cancelOEM").removeAttr("disabled");
            $("#lblLogotipo").removeClass("file-placeholder");
            $("#fileNameEspe").html(fileNameEspe);
            $("#lblLogotipo").html(fName);
        }
        if (file_Files_invoice != " ") {
            file_Files_invoice = " ";
            $("#inputFactura").val("");
            $("#inputFactura").removeAttr("disabled");
            $("#cancelFactura").attr("disabled", "true");
            $("#lblFactura").html("Seleccionar una foto");
            $("#lblFactura").addClass("file-placeholder");
        }

        //reestablecer campos
        if (bool_prov_selected == true) {
            bool_prov_selected = false;
            $("#inpt_email_proveedor").removeAttr("disabled");
            $("#inpt_contacto_proveedor").removeAttr("disabled");
            $("#sel_ladaProv").removeAttr("disabled");
            $("#inpt_telefono_proveedor").removeAttr("disabled");
            $("#inpt_direccion_proveedor").removeAttr("disabled");
            $("#inputFactura").removeAttr("disabled");
            $("#cancelFactura").attr("disabled", "true");
        }

        // reset de la variable del paso y de los botones
        $("#txtStepActivo").val("1");
        $("#txtStepForm").val("1");
        $("#btnAgregarProd").css("display", "");
        $("#btnEditProd").css("display", "none");
        $("#btnAgregarEspP").css("display", "");
        $("#btnEditEspP").css("display", "none");
        $("#btnAgregarProv").css("display", "");
        $("#btnEditProv").css("display", "none");
        $("#btnAgregarEnvio").css("display", "");
        $("#btnEditEnv").css("display", "none");
        $("#btnAgregarCom").css("display", "");
        $("#btnEditCom").css("display", "none");
        $("#sel_ladaProv").val(0);
        $("#spLadaProv").html("");
        $("#inpt_telefono_proveedor").val("");
        $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");

        //reestablecer variables boleanas para validaciones por frames
        val_done = false; //f1
        val_personalizar = false; //f2
        val_proveedor = false; //f3

        $("#radioProdSi").attr("value", "false");
        $("#radioProdNo").attr("value", "false");
        $("#container-esp").css("display", "none");
        $("#iconColor").css("color", "#fff");
        $("#container-prov").css("display", "none");

        // Remover la clase de validacion correcta de los formularios
        $("#inpt_form_producto").removeClass("valid");
        $("#inpt_form_cantidad").removeClass("valid");
        $("#selUnidades_prod_sp").removeClass("valid");
        $("#inpt_form_especificaciones").removeClass("valid");
        $("#filesOEM").removeClass("valid");
        $("#lblLogotipo").removeClass("valid");
        $("#cancelOEM").removeClass("valid");
        $("#inpt_form_colores").removeClass("valid");
        $("#spColor").removeClass("valid");
        $("#inpt_prov_select").removeClass("valid");
        $("#inpt_email_proveedor").removeClass("valid");
        $("#inpt_email_proveedor").removeClass("valid");
        $("#inpt_contacto_proveedor").removeClass("valid");
        $("#inpt_form_destinoEntrega").removeClass("valid");
        $("#btnsEdicion").css("display", "none");
        $("#mnjEdicion").css("display", "none");

        var tipoEnvio = $("#lblEmpaque").html();
        var destino = $("#lblDestino").html();
        if (tipoEnvio == "Marítimo") {
            $("#rad_maritimo").attr("disabled");
            $("#rad_maritimo").attr("value", "true");
            $("#rad_aereo").attr("value", "false");
        } else if (tipoEnvio == "Áereo") {
            $("#rad_aereo").attr("disabled");
            $("#rad_aereo").attr("value", "true");
            $("#rad_maritimo").attr("value", "false");
        }
        $("#inpt_form_destinoEntrega").val(destino);
        $("#inpt_form_destinoEntrega").attr("disabled");

        productoComplete = false;
        oemCompleto = false;
        proveedorCompleto = false;
        envioCompleto = false;
        comentarioCompelto = false;
        idProd_Edit_p = null;
    }
    // funcion para bloquear los campor del proveedor al elegir uno ya existente
    function bloquear_campos_proveedor() {
        $('#inpt_contacto_proveedor').attr("disabled", "disabled");
        $('#inpt_email_proveedor').attr("disabled", "disabled");
        $('#sel_ladaProv').attr("disabled", "disabled");
        $('#spLadaProv').css("background", "#f4f6f9");
        $('#inpt_telefono_proveedor').attr("disabled", "disabled");
        $('#inpt_direccion_proveedor').attr("disabled", "disabled");
        $("#inputFactura").attr("disabled", "true");
        $("#cancelFactura").attr("disabled", "true");
        $("#lblFactura").html("Ya existe un archivo");
        $("#lblFactura").addClass("file-placeholder");
    }
    // funcion para desbloquer los campor del proveedor
    function desbloquear_campos_proveedor() {
        $('#inpt_email_proveedor').removeAttr("disabled");
        $('#inpt_contacto_proveedor').removeAttr("disabled");
        $('#sel_ladaProv').removeAttr("disabled");
        $('#spLadaProv').removeAttr("disabled");
        $('#spLadaProv').css("background", "#fff");
        $('#inpt_telefono_proveedor').removeAttr("disabled");
        $('#inpt_direccion_proveedor').removeAttr("disabled");
        $("#inputFactura").val("");
        $("#inputFactura").removeAttr("disabled");
        $("#cancelFactura").attr("disabled", "true");
        $("#lblFactura").html("Seleccionar una foto");
        $("#lblFactura").addClass("file-placeholder");
    }
    // funcion para limpiar los campor del proveedor
    function nuevoProveedor() {
        if (bool_prov_selected == true) {
            bool_prov_selected = false;

            $("#editar_proveedor").css('display', 'none');
            $("#guardar_cambio_prov").css('display', 'none');
            $("#cancelar_cambio_prov").css('display', 'none');

            //reestablece valores de campos
            $("#inpt_contacto_proveedor").val("");
            $("#inpt_email_proveedor").val("");
            $("#inpt_direccion_proveedor").val("");
            $("#sel_ladaProv").val(0);
            $("#spLadaProv").html('');
            $("#inpt_telefono_proveedor").val('');
            $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
            if (file_Files_invoice != " ") {
                file_Files_invoice = " ";
                $("#inputFactura").val("");
                $("#inputFactura").removeAttr("disabled");
                $("#cancelFactura").attr("disabled", "true");
                $("#lblFactura").html("Seleccionar una foto");
                $("#lblFactura").addClass("file-placeholder");
            }

            desbloquear_campos_proveedor();
        }
    }
    // funcion para guardar los cambios del nuevo proveedor en el array del producto
    function guardar_cambio_producto_prov_sin(id) {
        Validacion_proveedor_f3();
        if (val_proveedor == true) {                
            var long_prov = Object.keys(productos_prov).length;
            var long_pedido = Object.keys(pedido).length;
            var img_path_html = $("#fileNameProd" + id + "").html();
            var ubicacion;
            var index_provisional = null;

            //si no existe en ninguno no hay necesidad de hacer nada ya que los datos se guardan en el array al dar click en agregar otro o solicitar
            if (long_pedido != 0 || long_prov != 0) {
                //busca en sp
                for (var i = 0; i < long_pedido; i++) {
                    if (pedido[i].tipo_data == "productos_sp_cliente") {
                        if (pedido[i].producto == name_producto_provisional && pedido[i].cantidad == cantidad_producto_provisional
                            && pedido[i].especificaciones == descripcion_producto_provisional && pedido[i].unidades == unidades_producto_provisional) {
                            ubicacion = "sp";
                            index_provisional = i;
                            var data_name_producto_p = pedido[i].producto;
                            var data_cantidad_prov = pedido[i].cantidad;
                            var data_especificaciones_prov = pedido[i].especificaciones;
                            var data_unidades_prov = pedido[i].unidades;
                            var data_color_prov = pedido[i].color_oem;
                            var img_path_temporal = pedido[i].img_path;
                            var id_prod_temporal = pedido[i].id;
                            var file_frmdata_anterior = frmData.get(id_prod_temporal);                            
                            break;
                        }
                    }
                }

                //busca en productos_prov
                for (var i = 0; i < long_prov; i++) {
                    if (productos_prov[i].prod == name_producto_provisional && productos_prov[i].cant == cantidad_producto_provisional
                        && productos_prov[i].unidades == unidades_producto_provisional && productos_prov[i].especificaciones == descripcion_producto_provisional) {
                        ubicacion = "prov";
                        index_provisional = i;
                        var data_name_producto_p = productos_prov[i].prod;
                        var data_cantidad_prov = productos_prov[i].cant;
                        var data_especificaciones_prov = productos_prov[i].especificaciones;
                        var data_unidades_prov = productos_prov[i].unidades;
                        var data_color_prov = productos_prov[i].color_oem;
                        var img_path_temporal = productos_prov[i].img_path;
                        var id_prod_temporal = productos_prov[i].id;
                        var file_frmdata_anterior = frmData_prov.get(id_prod_temporal);                        
                        break;
                    }
                }

                //si el producto existe en el array, en cualquiera de los 2
                if (index_provisional != null) {
                    //if radio = si
                    if (provEdicion == true) {
                        //revisar el id
                        var id_selected_value = $('#inpt_nombre_proveedor').val();
                        var id_selected = parseInt(id_selected_value);

                        //proveedor, si no existe se genera
                        if (!parseInt(id_selected, 10) && rad_prov == "Si") {
                            //si existe invoice
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
                            } else {
                                path_temporal = null;
                            }

                            data_proveedor_cliente = {
                                tipo_data: 'proveedor_cliente',
                                id_prov_interno: id_prov_interno,
                                proveedor: $('#inpt_nombre_proveedor').val(),
                                email: $('#inpt_email_proveedor').val(),
                                contacto: $('#inpt_contacto_proveedor').val(),
                                id_lada: $('#sel_ladaProv').val(),
                                telefono: $('#inpt_telefono_proveedor').val(),
                                direccion: $('#inpt_direccion_proveedor').val(),
                                productos: productos_prov,
                                invoice_path: path_temporal,
                            }
                            pedido.push(data_proveedor_cliente);
                            //reestablecer valores prov e imprimir datos
                            id_selected = id_prov_interno;
                            id_prov_interno++;

                            selProv.select2({
                                data: [{
                                    id: data_proveedor_cliente.id_prov_interno,
                                    text: data_proveedor_cliente.proveedor,
                                },],
                                tags: true,
                                placeholder: "Nombre del proveedor",
                                selectOnClose: true,
                                closeOnSelect: true,
                                allowClear: true,
                            });
                            selProv.val(null).trigger("change");
                        }

                        llenadoProveedor(id);
                        pasoActual();
                        
                        //si esta en sp hay que cambiarlo a proveedor
                        if (ubicacion == "sp") {
                            //si existe imagen se debe hacer el cambio de frmdata
                            if (file_frmdata_anterior != null) {
                                //se agrega al frmdata de proveedor y se elimina del frmdata del sp
                                frmData_prov.append('' + i_interno_prod + '', file_frmdata_anterior);
                                frmData.delete(id_prod_temporal);

                                for (var j = 0; j < arreglo_imagenes.length; j++) {
                                    if (img_path_html == arreglo_imagenes[j].nombre_original) {
                                        var data_img = {
                                            id: i_interno_prod,
                                            nombre_original: arreglo_imagenes[j].nombre_original,
                                            ruta: 'files/productos_cp/',
                                        }
                                        arreglo_imagenes_prov.push(data_img);
                                        arreglo_imagenes.splice(j,1);
                                        break;
                                    }
                                }
                            }
                            var nuevo_path;
                            if (img_path_temporal == null) {
                                nuevo_path = null;
                            }else{
                                nuevo_path = i_interno_prod+'_'+img_path_html;
                            }
                            //generando data para prod_prov
                            var data = {  //data de producto con proveedor nuevo
                                'id': i_interno_prod,
                                id_prov_interno: id_selected,
                                'prod': data_name_producto_p,
                                'cant': data_cantidad_prov,
                                'unidades': data_unidades_prov,
                                'especificaciones': data_especificaciones_prov,
                                'color_oem': data_color_prov,
                                'img_path': nuevo_path,
                            };
                            productos_prov.push(data);                            
                            i_interno_prod++;
                            //se elimina del arreglo en el que estaba (sp)
                            pedido.splice(index_provisional, 1);
                        }else if (ubicacion == "prov") { //si esta en prov y hay proveedor solo se hace actualizacion de id
                            productos_prov[index_provisional].id_prov_interno = id_selected;
                        }
                    }else{ //si esta en prov hay que cambiarlo a sp si no hay proveedor
                        if (ubicacion == "prov") {
                            //si existe imagen se debe hacer el cambio de frmdata
                            if (file_frmdata_anterior != null) {
                                //se agrega al frmdata de sp y se elimina del frmdata del prov
                                frmData.append('' + i_interno_prod + '', file_frmdata_anterior);
                                frmData_prov.delete(id_prod_temporal);

                                for (var j = 0; j < arreglo_imagenes_prov.length; j++) {
                                    if (img_path_html == arreglo_imagenes_prov[j].nombre_original) {
                                        var data_img = {
                                            id: countimagen,
                                            nombre_original: arreglo_imagenes_prov[j].nombre_original,
                                            ruta: 'files/productos_sp/',
                                        }
                                        arreglo_imagenes.push(data_img);
                                        arreglo_imagenes_prov.splice(j,1);
                                        break;
                                    }
                                }
                            }
                            var nuevo_path;
                            if (img_path_temporal == null) {
                                nuevo_path = null;
                            }else{
                                nuevo_path = countimagen+'_'+img_path_html;
                            }
                            //generacion de data
                            var data_producto_sp_cliente = {
                                id: countimagen,
                                tipo_data: 'productos_sp_cliente',
                                producto: data_name_producto_p,
                                cantidad: data_cantidad_prov,
                                unidades: data_unidades_prov,
                                color_oem: data_color_prov,
                                especificaciones: data_especificaciones_prov,
                                img_path: nuevo_path,
                            }
                            //push a sp
                            pedido.push(data_producto_sp_cliente);
                            countimagen++;
                            //eliminacion del array de prov
                            productos_prov.splice(index_provisional, 1);
                        }
                    }

                    //reestablece valores de campos de proveedor
                        if (file_Files_invoice != " ") {
                            file_Files_invoice = " ";
                            $("#inputFactura").val("");
                            $("#inputFactura").removeAttr("disabled");
                            $("#cancelFactura").attr("disabled", "true");
                            $("#lblFactura").html("Seleccionar una foto");
                            $("#lblFactura").addClass("file-placeholder");
                        }

                        if (bool_prov_selected == true) {
                            nuevoProveedor();
                        }

                        val_proveedor = false; //f3
                        
                        $("#radioProdSi").attr("value", "false");
                        $("#radioProdNo").attr("value", "false");
                        $("#radioProvSi").prop('checked', false);
                        $("#radioProvNo").prop('checked', false);
                        $("#container-esp").css("display", "none");
                        $("#iconColor").css("color", "#fff");
                        $("#container-prov").css("display", "none");
                        $("#inpt_prov_select").removeClass("valid");
                        $("#inpt_email_proveedor").removeClass("valid");
                        $("#inpt_contacto_proveedor").removeClass("valid");
                        
                        $("#inpt_email_proveedor").val("");
                        $("#inpt_contacto_proveedor").val("");
                        $("#sel_ladaProv").val(0);
                        $("#spLadaProv").html("");
                        $("#inpt_telefono_proveedor").val("");
                        $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                        $("#inpt_direccion_proveedor").val("");
                    //end
                }//si no existe no se ha generado en ningun array por lo que no se necesita este proceso
                else{
                    var prov = $("#inpt_nombre_proveedor option:selected").text();
                    if (prov != "") {
                        llenadoProveedor(id);
                        pasoActual();
                    }
                }
            } else {
                var prov = $("#inpt_nombre_proveedor option:selected").text();
                if (prov != "") {
                    llenadoProveedor(id);
                    pasoActual();
                }
            }
            
            name_producto_provisional = null;
            cantidad_producto_provisional = null;
            unidades_producto_provisional = null;
            descripcion_producto_provisional = null;
            color_esp_provisional = null;
            img_path_edicion_provisional = null;
        }
        edicion_cambio_proveedor = false;
    }
//

// Funciones de la barra de progeso segun los pasos que avanza
    function progressBarPaso1() {
        $("#progressForm").css("display", "");
        $("#numProgress").html("0% progreso");
        $("#barProgress").css("width", "0%");
    }
    function progressBarPaso2() {
        $("#numProgress").html("20% progreso");
        $("#barProgress").css("width", "20%");
    }
    function progressBarPaso3() {
        $("#numProgress").html("40% progreso");
        $("#barProgress").css("width", "40%");
    }
    function progressBarPaso4() {
        $("#numProgress").html("60% progreso");
        $("#barProgress").css("width", "60%");
    }
    function progressBarPaso5() {
        $("#numProgress").html("80% progreso");
        $("#barProgress").css("width", "80%");
    }
    function progressBarPaso6() {
        $("#numProgress").html("90% progreso");
        $("#barProgress").css("width", "90%");
    }

    //funcion dom para evitar el submit del formulario al dar enter
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });

var inicio = {
    activos: function () {
        dataAjax_Proveedores = cargar_ajax.run_server_ajax("Clientes/getProveedoresCliente/"+id_cliente+"");
        if (dataAjax_Proveedores !== false) {
            dataAjax_Proveedores.forEach(elem => {
                var dta = {
                    id: 'a'+elem.id_proveedor_c,
                    text: elem.proveedor,
                }
                data_proveedor_cliente2.push(dta);
            });
        }
        progressBarPaso1();
        funcSetp1();
        $(".popValidacion").popover();
        //select2 en input nombre proveedor
        $("#inpt_nombre_proveedor").select2({
            data: data_proveedor_cliente2,
            tags: true,
            /*ajax: {
                url: 'getProveedoresCliente/'+id_cliente,
                type: "GET",
                dataType: 'json',
                data: function (params) {
                  var query = {
                    search: params.term,
                    type: 'public'
                  }

                  // Query parameters will be ?search=[term]&type=public
                  return query;
                },
                processResults: function (data) {
                  return {
                    results: $.map(data, function(obj) {
                      return { id: obj.id_proveedor_c, text: obj.proveedor };
                    })
                  };
                }
            },*/
            selectOnClose: true,
            closeOnSelect: true,
            placeholder: "Nombre del proveedor",
            allowClear: true,
        }).on("select2:unselecting", function () {
            $(this).data("unselecting", true);
            nuevoProveedor();
        }).on("select2:select", function (e) {
            var long = Object.keys(pedido).length;
            var longDajax = Object.keys(dataAjax_Proveedores).length;
            var name_text_val = $("#inpt_nombre_proveedor").val();          //id
            var text = $("#inpt_nombre_proveedor option:selected").text();  //texto
            flechasOnCLick();
            
            //identifica si es numero
            if (parseInt(name_text_val, 10)) {
                bool_insertadoPrevio = false;
            }else{
                if (name_text_val.charAt(0) == 'a' && (!isNaN(name_text_val.charAt(1))) && (name_text_val!=text)) {
                    bool_insertadoPrevio = true;
                }else{
                    bool_insertadoPrevio = false;
                }
            }
            
            if (bool_insertadoPrevio == true) {
                for (var i = 0; i < longDajax; i++) {
                    if (dataAjax_Proveedores[i].id_proveedor_c == (name_text_val.slice(1))) {
                        //bool_prov_selected = true;
                        id_provisional_prov_i = 'a'+dataAjax_Proveedores[i].id_proveedor_c; //se iguala el id para guardar el nuevo producto con el proveedor
                        var direccion = dataAjax_Proveedores[i].direccion;
                        var telefono = dataAjax_Proveedores[i].telefono;
                        var lada = dataAjax_Proveedores[i].id_lada

                        //muestra valores
                        $("#inpt_contacto_proveedor").val(dataAjax_Proveedores[i].contacto);
                        $("#inpt_email_proveedor").val(dataAjax_Proveedores[i].email);

                        if (direccion != "") {
                            $("#inpt_direccion_proveedor").val(dataAjax_Proveedores[i].direccion);
                        } else {
                            $("#inpt_direccion_proveedor").val('');
                        }

                        if (telefono != "") {
                            $("#inpt_telefono_proveedor").val(telefono);
                            $("#sel_ladaProv").val(lada);
                            if (lada == 0) {
                                $("#spLadaProv").html('');
                            } else {
                                $("#spLadaProv").html($("#sel_ladaProv option:selected").text());
                            }
                        } else {
                            $("#sel_ladaProv").val(0);
                            $("#spLadaProv").html('');
                            $("#inpt_telefono_proveedor").val('');
                            $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                        }

                        if (invoice != null) {
                            var filName = invoice.split('_')[1];
                            $("#lblFactura").html(filName);
                            $("#lblFactura").removeClass("file-placeholder");
                        } else {
                            file_Files_invoice = " ";
                            $("#inputFactura").val("");
                            $("#lblFactura").html("Seleccionar una foto");
                            $("#lblFactura").addClass("file-placeholder");
                        }
                        $("#editar_proveedor").css("display", "");
                        $("#btnsEdicion").css("display", "");
                        $("#btnsEdicion").addClass("valid");
                        bloquear_campos_proveedor();
                        //break;
                    }
                }
                if (long!=0) {
                    for (var i = 0; i < long; i++) {
                        if (pedido[i].tipo_data == "proveedor_cliente_existente") {
                            if (id_provisional_prov_i == pedido[i].id_prov_interno) {
                                console.log('es el mismo')
                                bool_prov_selected = true;
                            }
                        }
                    }
                }
            }else{
                if (long != 0) {
                    //Comprueba que exista algo en el objeto
                    for (const test in pedido) {
                        //recorre el objeto
                        for (var i = 0; i < long; i++) {
                            //recorre el array
                            if (pedido[i].tipo_data == "proveedor_cliente") {
                                //comprueba que el arreglo sea con la data que se necesita
                                if (name_text_val == parseInt(name_text_val, 10) || bool_editar_prov == true) {
                                    //Comprueba si el valor es int (id), si no no es seleccionado del arreglo
                                    if (pedido[i].id_prov_interno == name_text_val) {
                                        //si es el mismo entonces lo declara
                                        id_provisional_prov_i = pedido[i].id_prov_interno; //se iguala el id para guardar el nuevo producto con el proveedor
                                        bool_prov_selected = true;
                                        var invoice = pedido[i].invoice_path;
                                        var direccion = pedido[i].direccion;
                                        var telefono = pedido[i].telefono;
                                        var lada = pedido[i].id_lada

                                        //muestra valores
                                        $("#inpt_contacto_proveedor").val(pedido[i].contacto);
                                        $("#inpt_email_proveedor").val(pedido[i].email);

                                        if (direccion != "") {
                                            $("#inpt_direccion_proveedor").val(pedido[i].direccion);
                                        } else {
                                            $("#inpt_direccion_proveedor").val('');
                                        }

                                        if (telefono != "") {
                                            $("#inpt_telefono_proveedor").val(telefono);
                                            $("#sel_ladaProv").val(lada);
                                            if (lada == 0) {
                                                $("#spLadaProv").html('');
                                            } else {
                                                $("#spLadaProv").html($("#sel_ladaProv option:selected").text());
                                            }
                                        } else {
                                            $("#sel_ladaProv").val(0);
                                            $("#spLadaProv").html('');
                                            $("#inpt_telefono_proveedor").val('');
                                            $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                                        }

                                        if (invoice != null) {
                                            var filName = invoice.split('_')[1];
                                            $("#lblFactura").html(filName);
                                            $("#lblFactura").removeClass("file-placeholder");
                                        } else {
                                            file_Files_invoice = " ";
                                            $("#inputFactura").val("");
                                            $("#lblFactura").html("Seleccionar una foto");
                                            $("#lblFactura").addClass("file-placeholder");
                                        }
                                        $("#editar_proveedor").css("display", "");
                                        $("#btnsEdicion").css("display", "");
                                        $("#btnsEdicion").addClass("valid");
                                        bloquear_campos_proveedor();
                                    }
                                } else {
                                    nuevoProveedor();
                                }
                            }
                        }
                    }
                } else {
                    nuevoProveedor();
                }
            }
        }).on("select2:opening", function (e) {
            if ($(this).data("unselecting")) {
                $(this).removeData("unselecting");
                e.preventDefault();
            }
        });
        // close
        selProv = $("#inpt_nombre_proveedor");
        // al seleccionar un color del colorpicker poner el nombre en el input y el color en el icono
        $("#inpt_form_colores").on("colorpickerChange", function (event) {
            $("#iconColor").css("color", event.color.toString());
            var color = event.color.toString();
            $("#inpt_form_colores").val(color);
            Validacion_personalizar_f2();
        });

        $("#selUnidades_prod_sp").on('click', function () {
            var idUnidad = $("#selUnidades_prod_sp").val();

            if (idUnidad == 1) {
                tipoMedida = "pzas";
            } else if (idUnidad == 2) {
                tipoMedida = "mts";
            } else if (idUnidad == 3) {
                tipoMedida = "kg";
            } else if (idUnidad == 4) {
                tipoMedida = "m2";
            } else if (idUnidad == 5) {
                tipoMedida = "tm";
            } else if (idUnidad == 6) {
                tipoMedida = "tn";
            } else if (idUnidad == 7) {
                tipoMedida = "lt";
            } else if (idUnidad == 8) {
                tipoMedida = "kt";
            }
        });
    },

    pasos: function () {
        // cambiar de formulario de acuerdo al paso en el que se encuentra
        $(".btnAgregar").on('click', function (event) {
            event.preventDefault();
            var Step = $("#txtStepActivo").val();
            var step = parseInt(Step) + 1;
            $("#txtStepActivo").val(step);
            $("#txtStepForm").val(step);
            if (step == 2) {
                Validacion_producto_f1();
                if (val_done == true) {
                    idProducto++;
                    idProd_Edit = idProducto;
                    collapsed();
                    productoComplete = true;
                    progressBarPaso2();
                    funcSetp2();
                    $("#btnEditProd").css("display", "");
                    $("#btnAgregarProd").css("display", "none");
                    if (oemComplete == false) {
                        $("#fileNameEspe").html(fileNameEspe);
                    } else {
                        $("#fileNameEspe").html(fileNameEspe);
                        $("#filesOEM").attr("disabled", "true");
                        $("#cancelOEM").removeAttr("disabled");
                        $("#lblLogotipo").removeClass("file-placeholder");
                    }
                } else {
                    step = step - 1;
                    $("#txtStepActivo").val(step);
                    $("#txtStepForm").val(step);
                }
            } else if (step == 3) {
                Validacion_personalizar_f2();
                if (val_personalizar == true) {
                    progressBarPaso3();
                    funcSetp3();
                    llenadoPersonalizar(idProducto);
                    oemCompleto = true;
                    $("#fileNameProv" + idProducto + "").html(fileNameProv);
                    $("#btnEditEspP").css("display", "");
                    $("#btnAgregarEspP").css("display", "none");
                } else {
                    step = step - 1;
                    $("#txtStepActivo").val(step);
                    $("#txtStepForm").val(step);
                }
            } else if (step == 4) {
                Validacion_proveedor_f3();
                if (val_proveedor == true) {
                    llenadoProveedor(idProducto);
                    proveedorCompleto = true;
                    if (envComplete == false && comComplete == false) {
                        progressBarPaso4();
                        funcSetp4();
                        $("#btnEditProv").css("display", "");
                        $("#btnAgregarProv").css("display", "none");
                    } else if (envComplete == true && comComplete == false) {
                        progressBarPaso5();
                        funcSetp5();
                        $("#btnEditProv").css("display", "");
                        $("#btnAgregarProv").css("display", "none");
                        $("#btnEditEnv").css("display", "");
                        $("#btnAgregarEnvio").css("display", "none");
                        step = step + 1;
                        $("#txtStepActivo").val(step);
                        $("#txtStepForm").val(step);
                    } else if (envComplete == true && comComplete == true) {
                        progressBarPaso6();
                        funcSetp6();
                        $("#btnEditProv").css("display", "");
                        $("#btnAgregarProv").css("display", "none");
                        $("#btnEditCom").css("display", "");
                        $("#btnAgregarCom").css("display", "none");
                        step = step + 2;
                        $("#txtStepActivo").val(step);
                        $("#txtStepForm").val(step);
                    }
                } else {
                    step = step - 1;
                    $("#txtStepActivo").val(step);
                    $("#txtStepForm").val(step);
                }
            } else if (step == 5) {
                if (envComplete == false && comComplete == false) {
                    Validacion_envio_f4();
                    if (val_envio == true) {
                        llenadoEnvio();
                        envioCompleto = true;
                        progressBarPaso5();
                        funcSetp5();
                        $("#btnEditEnv").css("display", "");
                        $("#btnAgregarEnvio").css("display", "none");
                    } else {
                        step = step - 1;
                        $("#txtStepActivo").val(step);
                        $("#txtStepForm").val(step);
                    }
                } else if (envComplete == true && comComplete == false) {
                    progressBarPaso6();
                    funcSetp6();
                    $("#btnEditCom").css("display", "");
                    $("#btnAgregarCom").css("display", "none");
                    step = step + 1;
                    $("#txtStepActivo").val(step);
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == true) {
                    progressBarPaso6();
                    funcSetp6();
                    $("#btnEditCom").css("display", "");
                    $("#btnAgregarCom").css("display", "none");
                    step = step + 2;
                    $("#txtStepActivo").val(step);
                    $("#txtStepForm").val(step);
                }
            } else if (step == 6) {
                llenadoComentario();
                comentarioCompelto = true;
                progressBarPaso6();
                funcSetp6();
                if (comComplete == false) {
                    $("#btnEditCom").css("display", "none");
                    $("#btnAgregarCom").css("display", "");
                } else {
                    $("#btnEditCom").css("display", "");
                    $("#btnAgregarCom").css("display", "none");
                }
            }
        });

        // eliminar el producto de la lista del pedido
        $(document).on('click', '#btnEliminarProd', function (form) {
            form.preventDefault();
            var id = $(this).data("id");
            id_producto = id;
            var long_prov = Object.keys(productos_prov).length;
            var long_pedido = Object.keys(pedido).length;
            var cantProd = $("#txtCantidad" + id_producto + "").html();
            var cantidad = parseFloat(cantProd.replace(/,/g, ""));
            var cantFix = cantidad.toFixed(2);
            var cantStr = String(cantFix);
            var cantN = numberWithCommas(cantStr);
            name_producto_provisional = $("#txtNombProd" + id_producto + "").html();
            cantidad_producto_provisional = parseFloat((cantN).replace(/,/g, ""));
            unidades_producto_provisional = $("#txtMedida" + id_producto + "").html();
            descripcion_producto_provisional = $("#txtEspecif" + id_producto + "").html();
            color_esp_provisional = $("#txtColor" + id_producto + "").html();
            img_path_edicion_provisional = $("#fileNameProd" + id_producto + "").html();
            var eliminado = false;

            for (var i = 0; i < long_pedido; i++) {
                if (pedido[i].tipo_data == "productos_sp_cliente") {
                    if (pedido[i].producto == name_producto_provisional && pedido[i].cantidad == cantidad_producto_provisional
                        && pedido[i].especificaciones == descripcion_producto_provisional && pedido[i].unidades == unidades_producto_provisional) {
                        if (pedido[i].img_path != null) {
                            // eliminar de arreglo imagenes y frmdata
                            frmData.delete(pedido[i].id);
                            for (var j = 0; j < arreglo_imagenes.length; j++) {
                                if (img_path_edicion_provisional == arreglo_imagenes[j].nombre_original) {
                                    arreglo_imagenes.splice(j,1);
                                    break;
                                }
                            }
                        }
                        pedido.splice(i,1);
                        eliminado = true;
                        break;
                    }
                }
            }

            for (var i = 0; i < long_prov; i++) {
                if (productos_prov[i].prod == name_producto_provisional && productos_prov[i].cant == cantidad_producto_provisional
                    && productos_prov[i].unidades == unidades_producto_provisional && productos_prov[i].especificaciones == descripcion_producto_provisional) {
                    if (productos_prov[i].img_path != null) {
                        // eliminar de arreglo imagenes y frmdata
                        frmData_prov.delete(productos_prov[i].id);
                        for (var j = 0; j < arreglo_imagenes_prov.length; j++) {
                            if (img_path_edicion_provisional == arreglo_imagenes_prov[j].nombre_original) {
                                arreglo_imagenes_prov.splice(j,1);
                                break;
                            }
                        }
                    }
                    productos_prov.splice(i,1);
                    eliminado = true;
                    break;
                }
            }

            if (eliminado == true) {
                if (cardsPedidos == 1 || cardsPedidos == 0) {
                    $("#lblDestino").html("");
                    $("#lblEmpaque").html("");
                    $("#lblComentario").html("");
                    envComplete = false;
                    comComplete = false;
                    $("#listaProductos").css('display', 'none');
                    $("#incioProductos").css('display', '');
                    $('#conten-productos').addClass('d-flex-partial cont-inicio');
                    $("#progressForm").css("display", "");
                    $("#numProgress").html("0% progreso");
                    $("#barProgress").css("width", "0%");                        
                    $("#txtStepActivo").val(1);
                    $("#txtStepForm").val(1);
                    funcSetp1();
                    reset_formulario();
                    $("#cardProducto" + id_producto + "").remove();
                } else {
                    $("#listaProductos").css('display', '');
                    $("#incioProductos").css('display', 'none');
                    $('#conten-productos').removeClass('d-flex-partial cont-inicio');
                    pasoActual();
                    $("#cardProducto" + id_producto + "").remove();
                }
            } else {
                if (cardsPedidos == 1 || cardsPedidos == 0) {
                    $("#lblDestino").html("");
                    $("#lblEmpaque").html("");
                    $("#lblComentario").html("");
                    envComplete = false;
                    comComplete = false;
                    $("#listaProductos").css('display', 'none');
                    $("#incioProductos").css('display', '');
                    $('#conten-productos').addClass('d-flex-partial cont-inicio');
                    $("#progressForm").css("display", "");
                    $("#numProgress").html("0% progreso");
                    $("#barProgress").css("width", "0%");                        
                    $("#txtStepActivo").val(1);
                    $("#txtStepForm").val(1);
                    funcSetp1();
                    reset_formulario();
                    $("#cardProducto" + id_producto + "").remove();
                } else {
                    $("#listaProductos").css('display', '');
                    $("#incioProductos").css('display', 'none');
                    $('#conten-productos').removeClass('d-flex-partial cont-inicio');
                    pasoActual();
                    $("#cardProducto" + id_producto + "").remove();
                }
            }
            cardsPedidos--;
            name_producto_provisional = null;
            cantidad_producto_provisional = null;
            unidades_producto_provisional = null;
            descripcion_producto_provisional = null;
            color_esp_provisional = null;
            img_path_edicion_provisional = null;
        });
    },

    editar_prod: function () {
        // guardar los cambios editados del producto
        $(document).on('click', '#btnEditProd', function (form) {
            form.preventDefault();
            var id = idProd_Edit;
            Validacion_producto_f1();

            if (val_done == true) {
                var long_prov = Object.keys(productos_prov).length;
                var long_pedido = Object.keys(pedido).length;

                if (long_pedido != 0 || long_prov != 0) {

                    for (var i = 0; i < long_pedido; i++) {
                        if (pedido[i].tipo_data == "productos_sp_cliente") {
                            if (pedido[i].producto == name_producto_provisional && pedido[i].cantidad == cantidad_producto_provisional
                                && pedido[i].especificaciones == descripcion_producto_provisional && pedido[i].unidades == unidades_producto_provisional) {

                                pedido[i].producto = $('#inpt_form_producto').val();
                                pedido[i].cantidad = parseFloat(($('#inpt_form_cantidad').val()).replace(/,/g, ""));
                                pedido[i].especificaciones = $('#inpt_form_especificaciones').val();
                                pedido[i].unidades = $('#selUnidades_prod_sp').val();

                                if (file_Files_provicional != file_Files) {
                                    var comprobacion = frmData.get(pedido[i].id);
                                    if (comprobacion != null) {
                                        if (file_Files != " ") {
                                            //si hay un archivo que reemplazar obtiene el nombre (para reemplazar en pedido[i]) y reemplaza en frmData
                                            pedido[i].img_path = id + "_" +file_Files.name;
                                            frmData.set(pedido[i].id, file_Files);
                                            
                                            for (var j = 0; j < arreglo_imagenes.length; j++) {
                                                if (img_path_edicion_provisional == arreglo_imagenes[j].nombre_original) {
                                                    arreglo_imagenes[j].nombre_original = file_Files.name;
                                                }
                                            }
                                        }else{
                                            //si se elimina el archivo se declara null (para reemplazar en pedido[i]) y se elimina del frmData

                                            pedido[i].img_path = null;
                                            frmData.delete(pedido[i].id);
                                            
                                            for (var j = 0; j < arreglo_imagenes.length; j++) {
                                                if (img_path_edicion_provisional == arreglo_imagenes[j].nombre_original) {
                                                    arreglo_imagenes.splice(j,1);
                                                    break;
                                                }
                                            }
                                        }
                                    }else{
                                        if (file_Files != " ") {
                                            var data_img = {
                                                id: id,
                                                nombre_original: file_Files.name,
                                                ruta: 'files/productos_sp/',
                                            }

                                            arreglo_imagenes.push(data_img);
                                            frmData.append('' + id + '', file_Files);

                                            pedido[i].img_path = id + "_" + file_Files.name;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    for (var i = 0; i < long_prov; i++) {
                        if (productos_prov[i].prod == name_producto_provisional && productos_prov[i].cant == cantidad_producto_provisional
                            && productos_prov[i].unidades == unidades_producto_provisional && productos_prov[i].especificaciones == descripcion_producto_provisional) {
                            
                            productos_prov[i].prod = $('#inpt_form_producto').val();
                            productos_prov[i].cant = parseFloat(($('#inpt_form_cantidad').val()).replace(/,/g, ""));
                            productos_prov[i].unidades = $('#selUnidades_prod_sp').val();
                            productos_prov[i].especificaciones = $('#inpt_form_especificaciones').val();

                            if (file_Files_provicional != file_Files) {
                                var comprobacion = frmData_prov.get(productos_prov[i].id);
                                if (comprobacion != null) {
                                    if (file_Files != " ") {
                                        //si hay un archivo que reemplazar obtiene el nombre (para reemplazar en pedido[i]) y reemplaza en frmData

                                        productos_prov[i].img_path = id + "_" +file_Files.name;
                                        frmData_prov.set(productos_prov[i].id, file_Files);
                                        
                                        for (var j = 0; j < arreglo_imagenes_prov.length; j++) {
                                            if (img_path_edicion_provisional == arreglo_imagenes_prov[j].nombre_original) {
                                                arreglo_imagenes_prov[j].nombre_original = file_Files.name;
                                            }
                                        }
                                    }else{
                                        //si se elimina el archivo se declara null (para reemplazar en pedido[i]) y se elimina del frmData

                                        productos_prov[i].img_path = null;
                                        frmData_prov.delete(productos_prov[i].id);
                                        
                                        for (var j = 0; j < arreglo_imagenes_prov.length; j++) {
                                            if (img_path_edicion_provisional == arreglo_imagenes_prov[j].nombre_original) {
                                                arreglo_imagenes_prov.splice(j,1);
                                                break;
                                            }
                                        }
                                    }
                                }else{
                                    if (file_Files != " ") {
                                        var data_img = {
                                            id: id,
                                            nombre_original: file_Files.name,
                                            ruta: 'files/productos_cp/',
                                        }

                                        arreglo_imagenes_prov.push(data_img);
                                        frmData_prov.append('' + id + '', file_Files);

                                        productos_prov[i].img_path = id + "_" + file_Files.name;
                                    }
                                }
                            }                            
                        }
                    }
                }

                llenadoProducto(id);
                pasoActual();
                file_Files_provicional = " ";
                name_producto_provisional = null;
                cantidad_producto_provisional = null;
                unidades_producto_provisional = null;
                descripcion_producto_provisional = null;
                color_esp_provisional = null;
                img_path_edicion_provisional = null;
            }
        });

        // editar el producto (obtencion de datos)
        $(document).on('click', '#btnEditarProd', function (form) {
            form.preventDefault();
            funcSetp1();
            llenadoParcial();
            flechas();
            var id = $(this).data("id");
            id_producto = id;
            idProd_Edit = id;
            $("#txtStepForm").val(1);
            $("#btnEditProd").css("display", "");
            $("#btnAgregarProd").css("display", "none");
            var fName = $("#fileNameProd" + id_producto + "").html();
            var nomProd = $("#txtNombProd" + id_producto + "").html();
            var cantProd = $("#txtCantidad" + id_producto + "").html();
            var medProd = $("#txtMedida" + id_producto + "").html();
            var espProd = $("#txtEspecif" + id_producto + "").html();
            var cantidad = parseFloat(cantProd.replace(/,/g, ""));
            var cantFix = cantidad.toFixed(2);
            var cantStr = String(cantFix);
            var cantN = numberWithCommas(cantStr);

            name_producto_provisional = nomProd;
            cantidad_producto_provisional = parseFloat((cantN).replace(/,/g, ""));
            unidades_producto_provisional = medProd;
            descripcion_producto_provisional = espProd;
            img_path_edicion_provisional = fName;

            if (medProd == "1") {
                $("#selUnidades_prod_sp").val(1);
            } else if (medProd == "2") {
                $("#selUnidades_prod_sp").val(2);
            } else if (medProd == "3") {
                $("#selUnidades_prod_sp").val(3);
            } else if (medProd == "4") {
                $("#selUnidades_prod_sp").val(4);
            } else if (medProd == "5") {
                $("#selUnidades_prod_sp").val(5);
            } else if (medProd == "6") {
                $("#selUnidades_prod_sp").val(6);
            } else if (medProd == "7") {
                $("#selUnidades_prod_sp").val(7);
            } else if (medProd == "8") {
                $("#selUnidades_prod_sp").val(8);
            }

            if (fName == " " || fName == "") {
                $("#filesImgProd").val("");
                $("#filesImgProd").removeAttr("disabled");
                $("#cancelImgProd").attr("disabled", "true");
                $("#lblImgProducto").addClass("file-placeholder");
                $("#lblImgProducto").html("Seleccionar una foto");
            } else {
                $("#filesImgProd").attr("disabled", "true");
                $("#cancelImgProd").removeAttr("disabled");
                $("#lblImgProducto").removeClass("file-placeholder");
                $("#lblImgProducto").html(fName);
                var long_prov = Object.keys(productos_prov).length;
                var long_pedido = Object.keys(pedido).length;
                for (var i = 0; i < long_pedido; i++) {
                    if (pedido[i].tipo_data == "productos_sp_cliente") {
                        if (pedido[i].producto == name_producto_provisional && pedido[i].cantidad == cantidad_producto_provisional && pedido[i].especificaciones == descripcion_producto_provisional && pedido[i].unidades == unidades_producto_provisional) {
                            file_Files_provicional = frmData.get(pedido[i].id);   //obtenemos el archivo en una var temporal
                        }
                    }
                }

                for (var i = 0; i < long_prov; i++) {
                    if (productos_prov[i].prod == name_producto_provisional && productos_prov[i].cant == cantidad_producto_provisional && productos_prov[i].unidades == unidades_producto_provisional && productos_prov[i].especificaciones == descripcion_producto_provisional) {
                        file_Files_provicional = frmData_prov.get(productos_prov[i].id);   //obtenemos el archivo en una var temporal
                    }
                }
                file_Files = file_Files_provicional;    //como existe lo ponemos en la variable usual, y reconocer si cambia para entrar a hacer la modificacion al array
            }

            $("#inpt_form_producto").val(nomProd);
            $("#inpt_form_cantidad").val(cantN);
            $("#inpt_form_especificaciones").val(espProd);
            $("#btnEditProd").css("display", "");
        });
    },

    editar_personaliza: function () {
        // guardar los combios editados de la perzonalizacion
        $(document).on('click', '#btnEditEspP', function (form) {
            form.preventDefault();
            var id = idProd_Edit;
            Validacion_personalizar_f2();
            if (val_personalizar == true) {
                var long_prov = Object.keys(productos_prov).length;
                var long_pedido = Object.keys(pedido).length;

                if (long_pedido != 0 || long_prov != 0) {
                    for (var i = 0; i < long_pedido; i++) {
                        if (pedido[i].tipo_data == "productos_sp_cliente") {
                            if (pedido[i].producto == name_producto_provisional && pedido[i].cantidad == cantidad_producto_provisional
                                && pedido[i].color_oem == color_esp_provisional) {

                                pedido[i].color_oem = $('#inpt_form_colores').val();
                            }
                        }
                    }

                    for (var i = 0; i < long_prov; i++) {
                        if (productos_prov[i].prod == name_producto_provisional && productos_prov[i].cant == cantidad_producto_provisional
                            && productos_prov[i].color_oem == color_esp_provisional) {

                            productos_prov[i].color_oem = $('#inpt_form_colores').val();
                        }
                    }
                }

                llenadoPersonalizar(id);
                pasoActual();

                name_producto_provisional = null;
                cantidad_producto_provisional = null;
                unidades_producto_provisional = null;
                descripcion_producto_provisional = null;
                color_esp_provisional = null;
                img_path_edicion_provisional = null;
            }
        });

        // editar la personalizacion (obtiene los datos)
        $(document).on('click', '#btnEditarPerso', function (form) {
            form.preventDefault();
            var id = $(this).data("id");
            id_producto = id;
            idProd_Edit = id;
            flechas();
            $("#txtStepForm").val(2);
            funcSetp2();
            llenadoParcial();
            $("#btnEditEspP").css("display", "");
            $("#btnAgregarEspP").css("display", "none");

            var rdOEM = $("#valRadioProd").val();
            if (rdOEM == "true") {
                $("#radioProdSi").prop('checked', true);
                $("#radioProdSi").is(":checked");
            } else if (rdOEM == "false") {
                $("#radioProdNo").prop('checked', true);
                $("#radioProdNo").is(":checked");
            }

            if (oemEdicion == false) {
                $("#radioProdNo").attr("value", "true");
                $("#radioProdSi").attr("value", "false");
                $("#container-esp").css("display", "none");
                $("#inpt_form_colores").val("");
                $("#filesOEM").val("");
                $("#lblLogotipo").html("");
                $("#iconColor").css("color", "#fff");

                var fName = $("#fileNameEspe").html();
                var colors = $("#txtColor" + id_producto + "").html();
                $("#lblLogotipo").html(fName);
                $("#inpt_form_colores").val(colors);
                $("#iconColor").css("color", colors);
            } else {
                $("#radioProdSi").attr("value", "true");
                $("#radioProdNo").attr("value", "false");
                $("#container-esp").css("display", "");
                $("#filesOEM").attr("disabled", "true");
                $("#cancelOEM").removeAttr("disabled");
                $("#lblLogotipo").removeClass("file-placeholder");
            }

            $("#btnEditEspP").css("display", "");

            var cantProd = $("#txtCantidad" + id_producto + "").html();
            var cantidad = parseFloat(cantProd.replace(/,/g, ""));
            var cantFix = cantidad.toFixed(2);
            var cantStr = String(cantFix);
            var cantN = numberWithCommas(cantStr);
            name_producto_provisional = $("#txtNombProd" + id_producto + "").html();
            cantidad_producto_provisional = parseFloat((cantN).replace(/,/g, ""));
            unidades_producto_provisional = $("#txtMedida" + id_producto + "").html();
            descripcion_producto_provisional = $("#txtEspecif" + id_producto + "").html();
            color_esp_provisional = $("#txtColor" + id_producto + "").html();
        });
    },

    editar_prov: function () {
        // guardar los cambios editados del proveedor
        $(document).on('click', '#btnEditProv', function (form) {
            form.preventDefault();
            var id = idProd_Edit_p;
            guardar_cambio_producto_prov_sin(id);
            idProd_Edit_p = null;
        });
        
        //obtiene los datos para editar el proveedor
        $(document).on('click', '#btnEditarProv', function (form) {
            form.preventDefault();
            var id = $(this).data("id");
            edicion_cambio_proveedor = true;
            id_producto = id;
            idProd_Edit_p = id;
            flechas();
            funcSetp3();
            llenadoParcial();
            $("#txtStepForm").val(3);
            $("#btnsEdicion").css("display", "");
            $("#editar_proveedor").css("display", "");
            $("#mnjEdicion").css("display", "");
            $("#inpt_prov_select").removeClass("valid");
            $("#inpt_email_proveedor").removeClass("valid");
            $("#inpt_contacto_proveedor").removeClass("valid");
            $("#btnEditProv").css("display", "");
            $("#btnAgregarProv").css("display", "none");

            var proveedor = $("#txtProveedor" + id_producto + "").html();
            var email = $("#txtCorreo" + id_producto + "").html();
            var contacto = $("#txtContacto" + id_producto + "").html();
            var idLada = $("#txtLadaVal" + id_producto + "").html();
            var lada = $("#txtLada" + id_producto + "").html();
            var telefono = $("#txtTelefono" + id_producto + "").html();
            var direccion = $("#txtDireccion" + id_producto + "").html();
            var img = $("#fileNameProv" + id_producto + "").html();

            var cantProd = $("#txtCantidad" + id_producto + "").html();
            var cantidad = parseFloat(cantProd.replace(/,/g, ""));
            var cantFix = cantidad.toFixed(2);
            var cantStr = String(cantFix);
            var cantN = numberWithCommas(cantStr);
            
            name_provisional = proveedor;
            name_producto_provisional = $("#txtNombProd" + id_producto + "").html();
            cantidad_producto_provisional = parseFloat((cantN).replace(/,/g, ""));
            unidades_producto_provisional = $("#txtMedida" + id_producto + "").html();
            descripcion_producto_provisional = $("#txtEspecif" + id_producto + "").html();
            color_esp_provisional = $("#txtColor" + id_producto + "").html();

            var rdProv = $("#valRadioProv").val();
            if (rdProv == "true" && proveedor != "") {
                bool_prov_selected = true;
                $("#radioProvSi").prop('checked', true);
                $("#radioProvSi").is(":checked");

                $("#valRadioProv").val(true);
                $("#container-prov").css("display", "");
                $("#div_val_radio_proveedor").css("display", "none");
                $("#lblProvSi").css("color", "#5b6670");
                $("#lblProvNo").css("color", "#5b6670");
                $(".select2-selection--single").attr("id", "inpt_prov_select");
                $("#pNoProveedor" + id_producto + "").css("display", "none");

                $("#inpt_nombre_proveedor option").each(function () {
                    var text = $(this).text();
                    if (proveedor == text) {
                        selProv.val($(this).val()).trigger('change.select2');
                    }
                });
                
                /*if (proveedor != "") {
                    $("#select2-inpt_nombre_proveedor-container").html('<span class="select2-selection__clear" title="Remove all items">×</span>' + proveedor);
                }*/
                $("#inpt_email_proveedor").val(email);
                $("#inpt_contacto_proveedor").val(contacto);
                if (direccion != "") {
                    $("#inpt_direccion_proveedor").val(direccion);
                } else {
                    $("#inpt_direccion_proveedor").val('');
                }
                if (telefono != "") {
                    $("#sel_ladaProv").val(idLada);
                    $("#spLadaProv").html(lada);
                    $("#inpt_telefono_proveedor").val(telefono);
                } else {
                    $("#sel_ladaProv").val(0);
                    $("#spLadaProv").html('');
                    $("#inpt_telefono_proveedor").val('');
                    $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                }
                if (img != "") {
                    var fName = $("#fileNameProv" + id_producto + "").html();
                    $("#lblFactura").html(fName);
                    $("#lblFactura").removeClass("file-placeholder");
                } else {
                    file_Files_invoice = " ";
                    $("#inputFactura").val("");
                    $("#inputFactura").removeAttr("disabled");
                    $("#cancelFactura").attr("disabled", "true");
                    $("#lblFactura").html("Seleccionar una foto");
                    $("#lblFactura").addClass("file-placeholder");
                }
                bloquear_campos_proveedor();
            } else {
                $("#radioProvNo").prop('checked', true);
                $("#radioProvNo").is(":checked");
                bool_prov_selected = true;
                nuevoProveedor();
            }            
        });
    },

    editar_envio: function () {
        // guardar los combios editados del producto
        $(document).on('click', '#btnEditEnv', function (form) {
            form.preventDefault();
            var id = idProd_Edit;
            var stepActivo = $("#txtStepActivo").val();
            llenadoEnvio(id);
            Validacion_envio_f4();
            if (val_envio == true) {
                pasoActual();
            }
        });

        // editar el producto
        $(document).on('click', '#btnEditarEnvio', function (form) {
            form.preventDefault();
            $("#txtStepForm").val(4);
            funcSetp4();
            llenadoParcial();
            flechas();
            var destino = $("#lblDestino").html();
            $("#inpt_form_destinoEntrega").val(destino);
            $("#btnEditEnv").css("display", "");
            $("#btnAgregarEnvio").css("display", "none");

            var mar = $("#rad_maritimo").val();
            var aire = $("#rad_aereo").val();
            if (mar == "true") {
                $("#rad_maritimo").prop('checked', true);
                $("#rad_maritimo").is(":checked");
            } else if (aire == "true") {
                $("#rad_aereo").prop('checked', true);
                $("#rad_aereo").is(":checked");
            }
        });
    },

    editar_comentario: function () {
        // guardar los combios editados del producto
        $(document).on('click', '#btnEditCom', function (form) {
            form.preventDefault();
            llenadoComentario();
            pasoActual();
        });

        // editar el producto
        $(document).on('click', '#btnEditarComent', function (form) {
            form.preventDefault();
            $("#txtStepForm").val(5);
            funcSetp5();
            llenadoParcial();
            flechas();
            var coment = $("#lblComentario").html();
            $("#inpt_comentarios").val(coment);
            $("#btnEditCom").css("display", "");
            $("#btnAgregarCom").css("display", "none");
        });
    },

    captura_archivo: function () {
        // Seccion productos
        // mostrar el nombre del archivo en el input del producto
        $("#filesImgProd").on("change", function (event) {
            var inputFile = event.currentTarget;
            file_Files = inputFile.files[0];
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings("#lblImgProducto").addClass("selected").html(fileName);
            fileNameProd = fileName;
            $("#filesImgProd").attr("disabled", "true");
            $("#cancelImgProd").removeAttr("disabled");
            $("#lblImgProducto").removeClass("file-placeholder");

            reader.onload = function (event) {
                var path = event.target.result;
                pathProd = path;
            };
            reader.readAsDataURL(file_Files);
        });
        $("#cancelImgProd").on('click', function (e) {
            e.preventDefault();
            file_Files = " ";
            lblFileProd = " ";
            $("#filesImgProd").val("");
            $("#filesImgProd").removeAttr("disabled");
            $("#cancelImgProd").attr("disabled", "true");
            $("#lblImgProducto").html("Seleccionar una foto");
            $("#lblImgProducto").addClass("file-placeholder");
        });

        //Seccion OEM
        // mostrar el nombre del archivo en el input del logotipo
        $("#filesOEM").on("change", function (e) {
            var inputFile = e.currentTarget;
            file_Files_oem = inputFile.files[0];
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings("#lblLogotipo").addClass("selected").html(fileName);
            fileNameEspe = fileName;
            oemComplete = true;
            Validacion_personalizar_f2();
            $("#filesOEM").attr("disabled", "true");
            $("#cancelOEM").removeAttr("disabled");
            $("#lblLogotipo").removeClass("file-placeholder");

            reader.onload = function (event) {
                var path = event.target.result;
                pathOem = path;
            };
            reader.readAsDataURL(file_Files_oem);
        });
        $("#cancelOEM").on('click', function (e) {
            e.preventDefault();
            file_Files_oem = " ";
            fileOEM = " ";
            lblFileOEM = " ";
            Validacion_personalizar_f2();
            $("#filesOEM").val("");
            $("#filesOEM").removeAttr("disabled");
            $("#cancelOEM").attr("disabled", "true");
            $("#lblLogotipo").html("Seleccionar una foto");
            $("#lblLogotipo").addClass("file-placeholder");
            oemComplete = false;
        });

        //Seccion invoice
        // mostrar el nombre del archivo en el input de la factura del proveedor
        $("#inputFactura").on("change", function (e) {
            var inputFile = e.currentTarget;
            file_Files_invoice = inputFile.files[0];
            var fileName = $(this).val().split("\\").pop();
            ext = $(this).val().split('.')[1];
            $(this).siblings("#lblFactura").addClass("selected").html(fileName);
            fileNameProv = fileName;
            $("#inputFactura").attr("disabled", "true");
            $("#cancelFactura").removeAttr("disabled");
            $("#lblFactura").removeClass("file-placeholder");

            reader.onload = function (event) {
                var path = event.target.result;
                pathProv = path;
            };
            reader.readAsDataURL(file_Files_invoice);
        });
        $("#cancelFactura").on('click', function (e) {
            file_Files_invoice = " ";
            fileProv = " ";
            lblFileProv = " ";
            $("#inputFactura").val("");
            $("#inputFactura").removeAttr("disabled");
            $("#cancelFactura").attr("disabled", "true");
            $("#lblFactura").html("Seleccionar una foto");
            $("#lblFactura").addClass("file-placeholder");
        });
    },

    opciones: function () {
        // opcion SI de la personalizacion del producto
        $("#radioProdSi").on("change", function () {
            if ($(this).is(":checked")) {
                var prodNo = $("#radioProdNo").attr("value");
                if (prodNo == "true") {
                    $("#btnEditEspP").css("display", "");
                    $("#btnAgregarEspP").css("display", "none");
                }
                radOEM = "Si";
                $("#valRadioProd").val(true);
                $("#radioProdSi").attr("value", "true");
                $("#radioProdNo").attr("value", "false");
                oemEdicion = true;
                idProd_Edit = idProducto;
                id_producto = idProd_Edit;
                $("#container-esp").css("display", "");
                $("#div_val_radio_personalizar").css("display", "none");
                $("#pNoPersonalizado" + id_producto + "").css("display", "none");
                $("#lblProdSi").css("color", "#5b6670");
                $("#lblProdNo").css("color", "#5b6670");
            }
        });
        // opcion NO de la personalizacion del producto
        $("#radioProdNo").on("change", function () {
            if ($(this).is(":checked")) {
                $("#radioProdSi").attr("value", "false");
                $("#radioProdNo").attr("value", "true");
                radOEM = "No";
                val_personalizar = true;
                oemEdicion = false;
                file_Files_oem = " ";
                idProd_Edit = idProducto;
                id_producto = idProd_Edit;
                oemCompleto = true;
                $("#valRadioProd").val(false);
                $("#container-esp").css("display", "none");
                $("#inpt_form_colores").val("");
                $("#filesOEM").val("");
                $("#lblLogotipo").html("");
                $("#iconColor").css("color", "#fff");
                $("#div_val_radio_personalizar").css("display", "none");
                $("#lblProdSi").css("color", "#5b6670");
                $("#lblProdNo").css("color", "#5b6670");
                $("#listPerzonalizar" + id_producto + "").css("display", "");
                $("#pNoPersonalizado" + id_producto + "").css("display", "");
                $("#pColors" + id_producto + "").css("display", "none");
                $("#pLogotipo" + id_producto + "").css("display", "none");
                $("#pColors" + id_producto + "").css("display", "none");
                $("#pLogotipo" + id_producto + "").css("display", "none");
                $("#iColor" + id_producto + "").css('color', '#fff');
                $("#txtColor" + id_producto + "").html('#fff');
                $("#imgLogotipo" + id_producto + "").html('');
                $("#btnEditEspP").css("display", "");
                $("#btnAgregarEspP").css("display", "none");
                Validacion_personalizar_f2();
                
                var Step = $("#txtStepActivo").val();
                if (envComplete == false && comComplete == false) {
                    if (proveedorCompleto == true) {
                        funcSetp4();
                        if (Step == "2") {
                            var step = 4;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    } else {
                        funcSetp3();
                        if (Step == "2") {
                            var step = 3;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    }
                } else if (envComplete == true && comComplete == false) {
                    if (proveedorCompleto == true) {
                        funcSetp5();
                        if (Step == "2") {
                            var step = 5;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    } else {
                        funcSetp3();
                        if (Step == "2") {
                            var step = 3;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    }
                } else if (envComplete == true && comComplete == true) {
                    if (proveedorCompleto == true) {
                        funcSetp6();
                        if (Step == "2") {
                            var step = 6;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    } else {
                        funcSetp3();
                        if (Step == "2") {
                            var step = 3;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    }
                }
                
            }
        });
        // opcion SI de si se tiene proveedor del proveedor
        $("#radioProvSi").on("change", function () {
            if ($(this).is(":checked")) {
                $("#radioProvSi").attr("value", "true");
                $("#radioProvNo").attr("value", "false");
                radProv = "Si";
                rad_prov = 'Si';
                provEdicion = true;
                idProd_Edit = idProducto;
                
                if (edicion_cambio_proveedor == true) {
                    id_producto = idProd_Edit_p;
                }else{
                    id_producto = idProd_Edit;
                }

                $("#valRadioProv").val(true);
                $("#container-prov").css("display", "");
                $("#div_val_radio_proveedor").css("display", "none");
                $("#lblProvSi").css("color", "#5b6670");
                $("#lblProvNo").css("color", "#5b6670");
                $(".select2-selection--single").attr("id", "inpt_prov_select");
                $("#pNoProveedor" + id_producto + "").css("display", "none");
            }
        });
        // opcion NO de si se tiene proveedor del producto
        $("#radioProvNo").on("change", function (e) {
            e.preventDefault();
            if ($(this).is(":checked")) {
                $("#radioProvSi").attr("value", "false");
                $("#radioProvNo").attr("value", "true");
                radProv = "No";
                rad_prov = 'No';
                val_proveedor = true;
                provEdicion = false;
                proveedorCompleto = true;
                
                idProd_Edit = idProducto;
                if (idProd_Edit_p != null) {
                    id_producto = idProd_Edit_p;
                }
                $("#valRadioProv").val(false);
                $("#div_val_radio_proveedor").css("display", "none");
                $("#lblProdSi").css("color", "#5b6670");
                $("#lblProdNo").css("color", "#5b6670");
                $("#listProveedor" + id_producto + "").css("display", "");
                $("#pNoProveedor" + id_producto + "").css("display", "");
                $("#pProveedor" + id_producto + "").css("display", "none");
                $("#pPersona" + id_producto + "").css("display", "none");
                $("#pCorreo" + id_producto + "").css("display", "none");
                $("#pTelefono" + id_producto + "").css("display", "none");
                $("#pDireccion" + id_producto + "").css("display", "none");
                $("#pFactura" + id_producto + "").css("display", "none");
                $("#btnEditProv").css("display", "");
                $("#btnAgregarProv").css("display", "none");
                $("#mnjEdicion").css("display", "none");
                $("#container-prov").css("display", "none");
                
                $("#txtProveedor" + id_producto + "").html("");
                $("#txtContacto" + id_producto + "").html("");
                $("#txtCorreo" + id_producto + "").html("");
                $("#txtLada" + id_producto + "").html("");
                $("#txtTelefono" + id_producto + "").html("");
                $("#txtLadaVal" + id_producto + "").html("");
                $("#txtDireccion" + id_producto + "").html("");
                $("#fileNameProv" + id_producto + "").html("");

                selProv.val(null).trigger("change");
                bool_prov_selected = true;
                nuevoProveedor();

                if (edicion_cambio_proveedor == true) {
                    guardar_cambio_producto_prov_sin(id_producto);
                    pasoActual();
                }else{
                    Validacion_personalizar_f2();
                    var Step = $("#txtStepActivo").val();
                    if (envComplete == false && comComplete == false) {
                        funcSetp4();
                        if (Step == "3") {
                            var step = 4;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    } else if (envComplete == true && comComplete == false) {
                        funcSetp5();
                        if (Step == "3") {
                            var step = 5;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else if (Step == "4") {
                            var step = 5;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    } else if (envComplete == true && comComplete == true) {
                        funcSetp6();
                        if (Step == "3") {
                            var step = 6;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else if (Step == "5") {
                            var step = 6;
                            $("#txtStepActivo").val(step);
                            $("#txtStepForm").val(step);
                        } else {
                            var step = parseInt(Step);
                            $("#txtStepForm").val(step);
                        }
                    }
                }
            }
        });
        // opcion de si el envio es maritimo
        $("#rad_maritimo").on("change", function () {
            if ($(this).is(":checked")) {
                $("#rad_maritimo").attr("value", "true");
                $("#rad_aereo").attr("value", "false");
                $("#div_val_radio_pb").css("display", "none");
                $("#lblMaritimo").css("color", "#5b6670");
                $("#lblAereo").css("color", "#5b6670");
                radEnvio = "Maritimo";
            }
        });
        // opcion de si el envio es aareo
        $("#rad_aereo").on("change", function () {
            if ($(this).is(":checked")) {
                $("#rad_maritimo").attr("value", "false");
                $("#rad_aereo").attr("value", "true");
                $("#div_val_radio_pb").css("display", "none");
                $("#lblMaritimo").css("color", "#5b6670");
                $("#lblAereo").css("color", "#5b6670");
                radEnvio = "Aereo";
            }
        });
    },

    backNext: function () {
        // cambiar a un formulario anterio al actual
        $("#arrowBack").on('click', function (event) {
            event.preventDefault();
            var Step = $("#txtStepActivo").val();
            var StepForm = $("#txtStepForm").val();
            var prodSi = $("#radioProdSi").val();
            var prodNo = $("#radioProdNo").val();
            var provSi = $("#radioProvSi").val();
            var provNo = $("#radioProvNo").val();
            idProd_Edit_p = idProducto;
            idProd_Edit = idProducto;
            id_producto = idProducto; /*|| (Step != 3 && StepForm == 3)*/
            if ((Step == 5 && StepForm == 5) || StepForm == 5) {
                if (envComplete == false && comComplete == false) {
                    var step = parseInt(StepForm) - 1;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == false) {
                    var step = parseInt(StepForm) - 2;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == true) {
                    var step = parseInt(StepForm) - 3;
                    $("#txtStepForm").val(step);
                }
            } else if ((Step == 6 && StepForm == 6) || StepForm == 6) {
                if (envComplete == false && comComplete == false) {
                    var step = parseInt(StepForm) - 1;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == false) {
                    var step = parseInt(StepForm) - 1;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == true) {
                    var step = parseInt(StepForm) - 3;
                    $("#txtStepForm").val(step);
                }
            } else {
                var step = parseInt(StepForm) - 1;
                $("#txtStepForm").val(step);
            }

            if (Step == StepForm) {
                if (step == 1) {
                    funcSetp1();
                } else if (step == 2) {
                    funcSetp2();
                    if (prodSi == "true") {
                        $("#radioProdSi").prop('checked', true);
                        $("#radioProdSi").is(":checked");
                    } else if (prodNo == "true") {
                        $("#radioProdNo").prop('checked', true);
                        $("#radioProdNo").is(":checked");
                    }
                } else if (step == 3) {
                    funcSetp3();
                    if (provSi == "true") {
                        $("#radioProvSi").prop('checked', true);
                        $("#radioProvSi").is(":checked");
                    } else if (provNo == "true") {
                        $("#radioProvNo").prop('checked', true);
                        $("#radioProvNo").is(":checked");
                    }
                } else if (step == 4) {
                    funcSetp4();
                } else if (step == 5) {
                    funcSetp5();
                } else if (step == 6) {
                    funcSetp6();
                }
            } else {
                if (step == 1) {
                    funcSetp1();
                } else if (step == 2) {
                    funcSetp2();
                    if (prodSi == "true") {
                        $("#radioProdSi").prop('checked', true);
                        $("#radioProdSi").is(":checked");
                    } else if (prodNo == "true") {
                        $("#radioProdNo").prop('checked', true);
                        $("#radioProdNo").is(":checked");
                    }
                } else if (step == 3) {
                    funcSetp3();
                    if (provSi == "true") {
                        $("#radioProvSi").prop('checked', true);
                        $("#radioProvSi").is(":checked");
                    } else if (provNo == "true") {
                        $("#radioProvNo").prop('checked', true);
                        $("#radioProvNo").is(":checked");
                    }
                } else if (step == 4) {
                    funcSetp4();
                } else if (step == 5) {
                    funcSetp5();
                } else if (step == 6) {
                    funcSetp6();
                }
            }
        });
        // cambiar al formulario actual
        $("#arrowNext").on('click', function (event) {
            event.preventDefault();
            var Step = $("#txtStepActivo").val();
            var StepForm = $("#txtStepForm").val();
            var prodSi = $("#radioProdSi").val();
            var prodNo = $("#radioProdNo").val();
            var provSi = $("#radioProvSi").val();
            var provNo = $("#radioProvNo").val();
            if ((Step == 5 && StepForm == 5) || (Step == 6 && StepForm == 6) || (StepForm == 3 && Step != 6)) {
                if (envComplete == false && comComplete == false) {
                    var step = parseInt(StepForm) + 1;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == false) {
                    var step = parseInt(StepForm) + 2;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == true) {
                    var step = parseInt(StepForm) + 3;
                    $("#txtStepForm").val(step);
                }
            } else if (Step == 6 && StepForm == 3) {
                if (envComplete == false && comComplete == false) {
                    var step = parseInt(StepForm) + 1;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == false) {
                    var step = parseInt(StepForm) + 3;
                    $("#txtStepForm").val(step);
                } else if (envComplete == true && comComplete == true) {
                    var step = parseInt(StepForm) + 3;
                    $("#txtStepForm").val(step);
                }
                
            } else {
                var step = parseInt(StepForm) + 1;
                $("#txtStepForm").val(step);
            }
            if (Step == StepForm) {
                if (step == 1) {
                    funcSetp1();
                } else if (step == 2) {
                    funcSetp2();
                    if (prodSi == "true") {
                        $("#radioProdSi").prop('checked', true);
                        $("#radioProdSi").is(":checked");
                    } else if (prodNo == "true") {
                        $("#radioProdNo").prop('checked', true);
                        $("#radioProdNo").is(":checked");
                    }
                } else if (step == 3) {
                    funcSetp3();
                    if (provSi == "true") {
                        $("#radioProvSi").prop('checked', true);
                        $("#radioProvSi").is(":checked");
                    } else if (provNo == "true") {
                        $("#radioProvNo").prop('checked', true);
                        $("#radioProvNo").is(":checked");
                    }
                } else if (step == 4) {
                    funcSetp4();
                } else if (step == 5) {
                    funcSetp5();
                } else if (step == 6) {
                    funcSetp6();
                }
            } else {
                if (step == 1) {
                    funcSetp1();
                } else if (step == 2) {
                    funcSetp2();
                    if (prodSi == "true") {
                        $("#radioProdSi").prop('checked', true);
                        $("#radioProdSi").is(":checked");
                    } else if (prodNo == "true") {
                        $("#radioProdNo").prop('checked', true);
                        $("#radioProdNo").is(":checked");
                    }
                } else if (step == 3) {
                    funcSetp3();
                    if (provSi == "true") {
                        $("#radioProvSi").prop('checked', true);
                        $("#radioProvSi").is(":checked");
                    } else if (provNo == "true") {
                        $("#radioProvNo").prop('checked', true);
                        $("#radioProvNo").is(":checked");
                    }
                } else if (step == 4) {
                    funcSetp4();
                } else if (step == 5) {
                    funcSetp5();
                } else if (step == 6) {
                    funcSetp6();
                }
            }
        });
    },

    formAgregar: function () {
        // enviar el pedido ya finalizado
        $('#agregar_pedido').on('submit', function (form) {
            form.preventDefault();
            //Bloqueo de boton submit y agregar mas,  sustituir despues por una pantalla de carga
            $("#btnSolicitarPedido").attr("disabled", "true");
            $("#btnAgregarMas").attr("disabled", "true");
            
            //eliminacion de proveedores que no tienen producto
                //esto se hace con la finalidad de no insertar proveedores sin productos
                var long_prov = Object.keys(productos_prov).length;
                var long_pedido = Object.keys(pedido).length;
                var data_eliminar= new Array();
                //primero busca en pedido los proveedores
                for (var i = 0; i < long_pedido; i++) {
                    if (pedido[i].tipo_data == "proveedor_cliente") {
                        //guardamos el id interno temporalmente y vamos a buscarlo en los productos
                        var id_tempo_prov_eliminar = pedido[i].id_prov_interno;
                        var count_elim = 0;
                        for (var j = 0; j < long_prov; j++) {
                            if (productos_prov[j].id_prov_interno == id_tempo_prov_eliminar) {
                                count_elim++;
                            }
                        }
                        if (count_elim == 0) {
                            var push ={
                                index: i,
                            }
                            data_eliminar.push(push);
                        }
                    }
                }
                //como no se puede eliminar en secuencia asendente porque cambiaria los indices obtenidos
                //se hace un for aparte de manera descendente, por eso se creo la data_eliminar
                var j= data_eliminar.length;
                for (var i = data_eliminar.length; i > 0; i--) {
                    j--;
                    pedido.splice(data_eliminar[j].index, 1);
                }
            //
            
            var cant = $('#inpt_form_cantidad').val();
            var cantidad = parseFloat((cant).replace(/,/g, ""));
            if (rad_prov == 'Si') { 
                //Obtencion de datos del proveedor
                //Si existe imagen en el producto
                if (file_Files != " ") {
                    var filename = file_Files.name;
                    var data_img = {
                        id: i_interno_prod,
                        nombre_original: filename,
                        ruta: 'files/productos_cp/',
                    }
                    arreglo_imagenes_prov.push(data_img);
                    frmData_prov.append('' + i_interno_prod + '', file_Files);
                    path_temporal_prov = i_interno_prod + "_" + filename;
                } else {
                    path_temporal_prov = null;
                }

                //si existe invoice
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
                } else {
                    path_temporal = null;
                }

                if (bool_prov_selected == false) {
                    if (bool_insertadoPrevio == true) {
                        data_proveedor_cliente = {
                            tipo_data: 'proveedor_cliente_existente',
                            id_prov_interno: id_provisional_prov_i,
                            proveedor: $('#inpt_nombre_proveedor option:selected').text(),
                            email: $('#inpt_email_proveedor').val(),
                            contacto: $('#inpt_contacto_proveedor').val(),
                            id_lada: $('#sel_ladaProv').val(),
                            telefono: $('#inpt_telefono_proveedor').val(),
                            direccion: $('#inpt_direccion_proveedor').val(),
                            productos: productos_prov,
                            invoice_path: path_temporal,
                        }
                        pedido.push(data_proveedor_cliente);
                        var data = {  //data de producto con proveedor nuevo
                            'id': i_interno_prod,
                            id_prov_interno: id_provisional_prov_i,
                            'prod': $('#inpt_form_producto').val(),
                            'cant': cantidad,
                            'unidades': $('#selUnidades_prod_sp').val(),
                            'especificaciones': $('#inpt_form_especificaciones').val(),
                            'color_oem': $('#inpt_form_colores').val(),
                            'img_path': path_temporal_prov,
                        };
                        productos_prov.push(data);
                    }else{
                        data_proveedor_cliente = {
                            tipo_data: 'proveedor_cliente',
                            id_prov_interno: id_prov_interno,
                            proveedor: $('#inpt_nombre_proveedor').val(),
                            email: $('#inpt_email_proveedor').val(),
                            contacto: $('#inpt_contacto_proveedor').val(),
                            id_lada: $('#sel_ladaProv').val(),
                            telefono: $('#inpt_telefono_proveedor').val(),
                            direccion: $('#inpt_direccion_proveedor').val(),
                            productos: productos_prov,
                            invoice_path: path_temporal,
                            id_proveedor_c: null,
                        }
                        pedido.push(data_proveedor_cliente);
                        
                        var data = {  //data de producto con proveedor nuevo
                            'id': i_interno_prod,
                            id_prov_interno: id_prov_interno,
                            'prod': $('#inpt_form_producto').val(),
                            'cant': cantidad,
                            'unidades': $('#selUnidades_prod_sp').val(),
                            'especificaciones': $('#inpt_form_especificaciones').val(),
                            'color_oem': $('#inpt_form_colores').val(),
                            'img_path': path_temporal_prov,
                        };
                        productos_prov.push(data);
                        id_prov_interno++;
                    }
                } else {
                    var data = {  //data de producto con proveedor ya ingresado
                        'id': i_interno_prod,
                        id_prov_interno: id_provisional_prov_i,
                        'prod': $('#inpt_form_producto').val(),
                        'cant': cantidad,
                        'unidades': $('#selUnidades_prod_sp').val(),
                        'especificaciones': $('#inpt_form_especificaciones').val(),
                        'color_oem': $('#inpt_form_colores').val(),
                        'img_path': path_temporal_prov,
                    };
                    productos_prov.push(data);
                }

                i_interno_prod++;
            } else if (rad_prov == 'No') {
                //Si existe imagen en el producto
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
                } else {
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

            if (file_Files_oem != " ") {
                path_oem_temporal = file_Files_oem.name;
            } else {
                path_oem_temporal = null;
            }

            //Data general proyecto base
            var data_proyecto_base = {
                id_cliente: id_cliente,
                colores: $('#inpt_form_colores').val(),
                comentarios: $("#lblComentario").html(),
                tipo_envio: tipo_enviovar,
                destino: $('#inpt_form_destinoEntrega').val(),
                fecha_creacion: today,
                oemservice_path: path_oem_temporal,
            }
            data_pedido_final = {
                'data_proyecto_base': data_proyecto_base,
                'pedido': pedido,
            }
            console.log(pedido)
            var response = cargar_ajax.run_server_ajax('Clientes/agregar_proyecto_base', data_pedido_final);
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
                "timeOut": "7500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            }

            toastr.options.onHidden = function () {
                // this will be executed after fadeout, i.e. 2secs after notification has been show
                funcExito();
            };

            if (response == 'false') {
                toastr.error("No se pudo registrar el pedido, error desconocido", "Error!");
            } else {
                toastr.success("Se ingreso correctamente la información", "Registro exitoso");

                //Envio de imagenes productos sp
                if (arreglo_imagenes != 0) {
                    frmData.append('imgs', JSON.stringify(arreglo_imagenes));
                    frmData.append('id_cliente', id_cliente);
                    resp = cargar_ajax2.run_server_ajax2('Clientes/enviar', frmData);
                    if (resp == undefined || resp.status == 'false') {
                        if (resp == undefined) {
                            toastr.error("No se pudo subir la imagen, error desconocido", "Error!");
                        } else if (resp.info == 'carga') {
                            toastr.error("No se pudo subir la imagen, error al subir", "Error!");
                        } else if (resp.info == 'extension') {
                            toastr.error("No se pudo subir la imagen, extension invalida", "Error!");
                        }
                    } else {
                        toastr.success("Se actualizo correctamente la imagen", "Actualización Correcta");
                    }
                }

                //Envio de imagenes productos sp
                if (arreglo_imagenes_prov != 0) {
                    frmData_prov.append('imgs', JSON.stringify(arreglo_imagenes_prov));
                    frmData_prov.append('id_cliente', id_cliente);
                    resp_prod_prov = cargar_ajax2.run_server_ajax2('Clientes/enviar_img_prod_prov', frmData_prov);
                    if (resp_prod_prov == undefined || resp_prod_prov.status == 'false') {
                        if (resp_prod_prov == undefined) {
                            toastr.error("No se pudo subir la imagen, error desconocido", "Error!");
                        } else if (resp_prod_prov.info == 'carga') {
                            toastr.error("No se pudo subir la imagen, error al subir", "Error!");
                        } else if (resp_prod_prov.info == 'extension') {
                            toastr.error("No se pudo subir la imagen, extension invalida", "Error!");
                        }
                    } else {
                        toastr.success("Se actualizo correctamente la imagen", "Actualización Correcta");
                    }
                }

                //Envio de archivos invoice
                if (arreglo_invoice != 0) {
                    frmData_inv.append('archivos_invoice', JSON.stringify(arreglo_invoice));
                    frmData_inv.append('id_cliente', id_cliente);
                    resp_inv = cargar_ajax2.run_server_ajax2('Clientes/enviar_inv', frmData_inv);
                    if (resp_inv == undefined || resp_inv.status == 'false') {
                        if (resp_inv == undefined) {
                            toastr.error("No se pudo subir la factura/invoice, error desconocido", "Error!");
                        } else if (resp_inv.info == 'carga') {
                            toastr.error("No se pudo subir la factura/invoice, error al subir", "Error!");
                        } else if (resp_inv.info == 'extension') {
                            toastr.error("No se pudo subir la factura/invoice, extension invalida", "Error!");
                        }
                    } else {
                        toastr.success("Se actualizo correctamente la factura/invoice", "Actualización Correcta");
                    }
                }

                //Envio oem
                if (file_Files_oem != 0) {
                    frmData_oem.append('oemservice_path', file_Files_oem);
                    frmData_oem.append('id_cliente', id_cliente);
                    resp_oem = cargar_ajax2.run_server_ajax2('Clientes/cargar_oem', frmData_oem);
                    if (resp_oem == undefined || resp_oem.status == 'false') {
                        if (resp_oem == undefined) {
                            toastr.error("No se pudo subir la imagen oem, error desconocido", "Error!");
                        } else if (resp_oem.info == 'carga') {
                            toastr.error("No se pudo subir la imagen oem, error al subir", "Error!");
                        } else if (resp_oem.info == 'extension') {
                            toastr.error("No se pudo subir la imagen oem, extension invalida", "Error!");
                        }
                    } else {
                        toastr.success("Se actualizo correctamente la imagen oem", "Actualización Correcta");
                    }
                }
            }
        });

        // Agregar mas productos
        $('#btnAgregarMas').on('click', function (form) {
            form.preventDefault();
            $("#collAction" + idProducto + "").attr('aria-expanded', 'false');
            $("#collapse" + idProducto + "").removeClass('show');

            var cant = $('#inpt_form_cantidad').val();
            var cantidad = parseFloat((cant).replace(/,/g, ""));
            if (rad_prov == 'Si') {
                //Obtencion de datos del proveedor
                //Si existe imagen en el producto
                if (file_Files != " ") {
                    var filename = file_Files.name;
                    var data_img = {
                        id: i_interno_prod,
                        nombre_original: filename,
                        ruta: 'files/productos_cp/',
                    }
                    arreglo_imagenes_prov.push(data_img);
                    frmData_prov.append('' + i_interno_prod + '', file_Files);
                    path_temporal_prov = i_interno_prod + "_" + filename;
                } else {
                    path_temporal_prov = null;
                }
                //si existe invoice
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

                if (bool_prov_selected == false) {
                    if (bool_insertadoPrevio == true) {
                        data_proveedor_cliente = {
                            tipo_data: 'proveedor_cliente_existente',
                            id_prov_interno: id_provisional_prov_i,
                            proveedor: $('#inpt_nombre_proveedor option:selected').text(),
                            email: $('#inpt_email_proveedor').val(),
                            contacto: $('#inpt_contacto_proveedor').val(),
                            id_lada: $('#sel_ladaProv').val(),
                            telefono: $('#inpt_telefono_proveedor').val(),
                            direccion: $('#inpt_direccion_proveedor').val(),
                            productos: productos_prov,
                            invoice_path: path_temporal,
                        }
                        pedido.push(data_proveedor_cliente);
                        var data = {  //data de producto con proveedor nuevo
                            'id': i_interno_prod,
                            id_prov_interno: id_provisional_prov_i,
                            'prod': $('#inpt_form_producto').val(),
                            'cant': cantidad,
                            'unidades': $('#selUnidades_prod_sp').val(),
                            'especificaciones': $('#inpt_form_especificaciones').val(),
                            'color_oem': $('#inpt_form_colores').val(),
                            'img_path': path_temporal_prov,
                        };
                        productos_prov.push(data);
                    }else{
                        data_proveedor_cliente = {
                            tipo_data: 'proveedor_cliente',
                            id_prov_interno: id_prov_interno,
                            proveedor: $('#inpt_nombre_proveedor').val(),
                            email: $('#inpt_email_proveedor').val(),
                            contacto: $('#inpt_contacto_proveedor').val(),
                            id_lada: $('#sel_ladaProv').val(),
                            telefono: $('#inpt_telefono_proveedor').val(),
                            direccion: $('#inpt_direccion_proveedor').val(),
                            productos: productos_prov,
                            invoice_path: path_temporal,
                            id_proveedor_c: null,
                        }
                        var dataX = {
                            id: id_prov_interno,
                            text: $('#inpt_nombre_proveedor').val(),
                        }
                        data_proveedor_cliente2.push(dataX);
                        pedido.push(data_proveedor_cliente);

                        var data = {  //data de producto con proveedor nuevo
                            'id': i_interno_prod,
                            id_prov_interno: id_prov_interno,
                            'prod': $('#inpt_form_producto').val(),
                            'cant': cantidad,
                            'unidades': $('#selUnidades_prod_sp').val(),
                            'especificaciones': $('#inpt_form_especificaciones').val(),
                            'color_oem': $('#inpt_form_colores').val(),
                            'img_path': path_temporal_prov,
                        };
                        productos_prov.push(data);
                        id_prov_interno++;
                    }
                } else {
                    var data = {  //data de producto con proveedor ya ingresado
                        'id': i_interno_prod,
                        id_prov_interno: id_provisional_prov_i,
                        'prod': $('#inpt_form_producto').val(),
                        'cant': cantidad,
                        'unidades': $('#selUnidades_prod_sp').val(),
                        'especificaciones': $('#inpt_form_especificaciones').val(),
                        'color_oem': $('#inpt_form_colores').val(),
                        'img_path': path_temporal_prov,
                    };
                    productos_prov.push(data);
                }
                i_interno_prod++;
            } else if (rad_prov == 'No') {
                //Si existe imagen en el producto
                if (file_Files != " ") {
                    var filename = file_Files.name;

                    var data_img = {
                        id: countimagen,
                        nombre_original: filename,
                        ruta: 'files/productos_sp/',
                    }

                    arreglo_imagenes.push(data_img);
                    frmData.append('' + countimagen + '', file_Files);
                    console.log(frmData.get('' + countimagen + ''));

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
            reset_formulario();
            funcSetp1();
        });
    },

    modals: function () {
        /* Modal para abrir el producto en modal */
        $(document).on('click', '.linkProducto', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $('#modalPedido').modal();
            });
            var id = $(this).data("id");
            id_producto = id;
            var src = $("#imgProductoFile" + id_producto + "").attr('src');
            $("#titleModal").html('Imagen producto');
            var img = '<img src="' + src + '" class="img-fluid files-pedido"></img>';
            $("#divImg").css("display", "");
            $("#divPDF").css("display", "none");
            $("#divPDF").empty();
            $("#divImg").empty();
            $("#divImg").append(img);
        });

        /* Modal para abrir el logotipo elegido del producto en modal */
        $(document).on('click', '.linkOEM', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $('#modalPedido').modal();
            });
            var src = $("#imgLogotipoFile").attr('src');
            $("#titleModal").html('Imagen logotipo');
            var img = '<img src="' + src + '" class="img-fluid files-pedido"></img>';
            $("#divImg").css("display", "");
            $("#divPDF").css("display", "none");
            $("#divPDF").empty();
            $("#divImg").empty();
            $("#divImg").append(img);
            jQuery(function ($) {
                $('#modalPedido').modal();
            });
        });

        /* Modal para abrir la factura/invoice del proveedor en modal */
        $(document).on('click', '.linkProveedor', function (event) {
            event.preventDefault();
            var id = $(this).data("id");
            id_producto = id;
            var src;
            var fl;
            if (ext == "jpg" || ext == "jpeg" || ext == "png" || ext == "JPG" || ext == "JPEG" || ext == "PNG") {
                src = $("#imgFactura" + id_producto + "").attr('href');
                fl = '<img class="img-fluid files-pedido" src="' + src + '"></img>';
                $("#divPDF").css("display", "none");
                $("#divPDF").empty();
                $("#divImg").css("display", "");
                $("#divImg").empty();
                $("#divImg").append(fl);
            } else if (ext == "pdf" || ext == "PDF") {
                src = $("#imgFactura" + id_producto + "").attr('href');
                fl = '<embed src="' + src + '" frameborder="0" width="100%" height="440px">';
                $("#divImg").css("display", "none");
                $("#divImg").empty();
                $("#divPDF").css("display", "");
                $("#divPDF").empty();
                $("#divPDF").append(fl);
            }
            $("#titleModal").html('Factura proveedor');
            jQuery(function ($) {
                $('#modalPedido').modal();
            });
        });
    },

    comentarios: function () {
        /*function desbloquear_factura() {
            var long = Object.keys(pedido).length;
    
            for (const test in pedido) {  //recorre el objeto
                for (var i = 0; i < long; i++) { //recorre el array
                    if (pedido[i].tipo_data == "proveedor_cliente") { //comprueba que el arreglo sea con la data que se necesita
                        if (pedido[i].proveedor == name_provisional || pedido[i].id_prov_interno == name_provisional) {   //si es el mismo entonces lo declara
                            if (pedido[i].invoice_path == null) {
                                $('#inputFactura').removeAttr("disabled");
                                $('#btnLimpiarFactura').removeAttr("disabled");
                            }
                        }
                    }
                }
            }
        }*/

        /*
            nota, la edicion de los campos del proveedor cuando se 
            encuentra en el array no interfiere con la edicion del 
            producto con proveedor ya que para hacer el cambio de un proveedor a otro
            se utiliza el id mientras que la sub edicion (datos del proveedor)
            lleva el name_provisional
            //desbloquea los campos para editar al proveedor
            $('#editar_proveedor').on('click', function (form) {
                form.preventDefault();
                //muestra botones y declara el valor provisional
                $('#guardar_cambio_prov').css('display', '');
                $('#cancelar_cambio_prov').css('display', '');
                name_provisional = $("#inpt_nombre_proveedor").val();
                bool_editar_prov = true;

                //desbloquea los campos
                desbloquear_campos_proveedor();
                desbloquear_factura();
            });
            //guarda los campos y bloquea de nuevo los campos
            $('#guardar_cambio_prov').on('click', function (form) {
                form.preventDefault();
                //oculta botones y declara longitud
                $('#guardar_cambio_prov').css('display', 'none');
                $('#cancelar_cambio_prov').css('display', 'none');
                var long = Object.keys(pedido).length;

                if (long != 0) {
                    //entra en arreglo pedido
                    for (const test in pedido) {
                        //recorre el arreglo
                        for (var i = 0; i < long; i++) {
                            //comprueba que el arreglo actual sea de proveedor o n+1
                            if (pedido[i].tipo_data == "proveedor_cliente") {
                                //si concuerda con el seleccionado entramos
                                if (pedido[i].proveedor == name_provisional || pedido[i].id_prov_interno == name_provisional) {
                                    bool_editar_prov = false;
                                    //cambia el valor de los datos
                                    pedido[i].proveedor = $("#inpt_nombre_proveedor").val();
                                    pedido[i].email = $("#inpt_email_proveedor").val();
                                    pedido[i].contacto = $('#inpt_contacto_proveedor').val();
                                    pedido[i].id_lada = $('#sel_Lada').val();
                                    pedido[i].telefono = $('#inpt_telefono_proveedor').val();
                                    pedido[i].direccion = $('#inpt_direccion_proveedor').val();

                                    if (file_Files_invoice != " ") {
                                        var filename = file_Files_invoice.name;

                                        var data_invoice = {
                                            id: pedido[i].id_prov_interno,
                                            nombre_original: filename,
                                            path: 'files/invoice_cliente/',
                                        }

                                        arreglo_invoice.push(data_invoice);
                                        frmData_inv.append('' + pedido[i].id_prov_interno + '', file_Files_invoice);

                                        pedido[i].invoice_path = pedido[i].id_prov_interno + "_" + filename;
                                    }
                                }
                            }
                        }
                    }
                }

                //vuelve a bloquear los campos
                bloquear_campos_proveedor();
            });
            //bloquea de nuevo los campos y reestablece los valores 
            $('#cancelar_cambio_prov').on('click', function (form) {
                form.preventDefault();
                bloquear_campos_proveedor();
                document.getElementById('guardar_cambio_prov').style.display = 'none';
                document.getElementById('cancelar_cambio_prov').style.display = 'none';
                var long = Object.keys(pedido).length;

                for (const test in pedido) {  //recorre el objeto
                    for (var i = 0; i < long; i++) { //recorre el array
                        if (pedido[i].tipo_data == "proveedor_cliente") { //comprueba que el arreglo sea con la data que se necesita
                            if (pedido[i].id_prov_interno == name_provisional) {   //si es el mismo entonces lo declara
                                bool_prov_selected = true;
                                document.getElementById("editar_proveedor").style.display = '';

                                //muestra valores
                                $('#inpt_contacto_proveedor').val(pedido[i].contacto);
                                $('#inpt_email_proveedor').val(pedido[i].email);
                                $('#sel_Lada').val(pedido[i].id_lada);
                                $('#spLada').html($('#sel_Lada option:selected').text());
                                $('#inpt_telefono_proveedor').val(pedido[i].telefono);
                                $('#inpt_direccion_proveedor').val(pedido[i].direccion);
                            }
                        }
                    }
                }
            });
        */
    },
};

jQuery(document).ready(function () {
    inicio.activos(this);
    inicio.pasos(this);
    inicio.opciones(this);
    inicio.backNext(this);
    inicio.captura_archivo(this);
    inicio.formAgregar(this);
    inicio.editar_prod(this);
    inicio.editar_personaliza(this);
    inicio.editar_prov(this);
    inicio.editar_envio(this);
    inicio.editar_comentario(this);
    inicio.modals(this);
});