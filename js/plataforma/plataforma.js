var frmData_perfil = new FormData();
var file_Files_perfil = " ";
var status1;
var baseUrl = $("#baseURL").val();
// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

function checkPago() {
	var chkTarjeta = document.getElementById("chkTarjeta");
	var chkReferencia = document.getElementById("chkReferencia");
	if (chkTarjeta.checked) {
		document.getElementById("formTrans").style.display = "none";
		document.getElementById("formTrajeta").style.display = "";
	} else {
		document.getElementById("formTrans").style.display = "";
		document.getElementById("formTrajeta").style.display = "none";
	}
}

$(document).ready(function () {
	$("#sel_validacion_existe_asesor").change(function () {
		if ($("#sel_validacion_existe_asesor").val() != 0) {
			document.getElementById(
				"sel_validacion_existe_asesor"
			).style.borderColor = "green";
			document.getElementById("div_asignacion").style.display = "none";
		} else {
			document.getElementById(
				"sel_validacion_existe_asesor"
			).style.borderColor = "red";
			document.getElementById("div_asignacion").style.display = "";
		}
	});
});

var plataforma = {
	agregar_proveedor: function () {
		$(document).on("click", ".addProveedor", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				//$("#modal_add_edit_proveedor").modal();
			});
			$("#modal_proveedorLabel").html("Agregar Proveedor");
		});

		$("#add_edit_proveedor").on("submit", function (form) {
			form.preventDefault();
			var IdProve = $("#txtIdProveedor").val();

			if (IdProve === "") {
				var data = {
					proveedor: $("#txt_proveedor").val(),
					contacto: $("#txt_contacto").val(),
					email: $("#txt_email").val(),
					id_lada: $("#sel_LadaProveedor").val(),
					telefono: $("#txt_telefonoProveedor").val(),
					direccion: $("#txt_direccion").val(),
					wechat: $("#txt_wechat").val(),
					website: $("#txt_webSite").val(),
				};

				cargar_ajax.run_server_ajax("Plataforma/crear_proveedor", data);

				//Crear funcion para producto
				resp_in_prov = cargar_ajax.run_server_ajax("Plataforma/ultimo_prov");
				var id_prov = resp_in_prov.id_proveedor;
				var data_producto = {
					id_proveedor: resp_in_prov.id_proveedor,
					producto: $("#txt_producto_provinsert").val(),
					fracc_arancelaria: $("#txt_fracc_provinsert").val(),
				};
				cargar_ajax.run_server_ajax("Plataforma/crear_producto", data_producto);

				swal
					.fire({
						title: "CORRECTO",
						text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
						icon: "success",
						timer: 2000,
						timerProgressBar: true,
						showConfirmButton: false,
					})
					.then((result) => {
						location.reload();
					});
			} else if (IdProve !== "") {
				var data = {
					id_proveedor: IdProve,
					proveedor: $("#txt_proveedor").val(),
					contacto: $("#txt_contacto").val(),
					email: $("#txt_email").val(),
					id_lada: $("#sel_LadaProveedor").val(),
					telefono: $("#txt_telefonoProveedor").val(),
					direccion: $("#txt_direccion").val(),
					wechat: $("#txt_wechat").val(),
					website: $("#txt_webSite").val(),
				};
				cargar_ajax.run_server_ajax("Plataforma/editar_proveedor", data);
				swal
					.fire({
						title: "CORRECTO",
						text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
						icon: "success",
						timer: 2000,
						timerProgressBar: true,
						showConfirmButton: false,
					})
					.then((result) => {
						location.reload();
					});
			}
		});

		// agregar proveedor desde la cotización
		$(document).on("click", ".btnaddNewProv", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_add_edit_proveedor").modal();
			});
			$("#modal_proveedorLabel").html("Agregar Proveedor");
		});
	},

	get_proveedor: function () {
		$(document).on("click", ".editProveedor", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#editProveedor").modal();
			});
			document.getElementById("div_prod_prov_add").style.display = "none";
			$("#txt_producto_provinsert").removeAttr("required");
			$("#txt_fracc_provinsert").removeAttr("required");

			$("#modal_proveedorLabel").html("Editar Proveedor");
			id_proveedor = $(this).data("id");
			var data = { id_proveedor: id_proveedor };
			var response = cargar_ajax.run_server_ajax(
				"Plataforma/get_datos_proveedor",
				data
			);

			$("#txtIdProveedor").val(id_proveedor);
			$("#txt_proveedor").val(response.proveedor);
			$("#txt_contacto").val(response.contacto);
			$("#txt_email").val(response.email);
			$("#txt_direccion").val(response.direccion);
			$("#txt_wechat").val(response.wechat);
			$("#txt_webSite").val(response.website);

			var idLada = response.id_lada;
			var tel = response.telefono;

			if (idLada === null) {
				$("#sel_LadaProveedor").val(0);
				$("#spLadaProveedor").html("");
				if (tel === null) {
					$("#txt_telefono").val("");
				} else {
					$("#txt_telefono").val(response.telefono);
				}
			} else if (idLada == 1) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 1)");
				$("#txt_telefono").val(tel.replace("(+ 1) ", ""));
			} else if (idLada == 2) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 52)");
				$("#txt_telefono").val(tel.replace("(+ 52) ", ""));
			} else if (idLada == 3) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 66)");
				$("#txt_telefono").val(tel.replace("(+ 66) ", ""));
			} else if (idLada == 4) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 81)");
				$("#txt_telefono").val(tel.replace("(+ 81) ", ""));
			} else if (idLada == 5) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 82)");
				$("#txt_telefono").val(tel.replace("(+ 82) ", ""));
			} else if (idLada == 6) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 84)");
				$("#txt_telefono").val(tel.replace("(+ 84) ", ""));
			} else if (idLada == 7) {
				$("#sel_LadaProveedor").val(idLada);
				$("#spLadaProveedor").html("(+ 86)");
				$("#txt_telefono").val(tel.replace("(+ 86) ", ""));
			}
		});
	},

	eliminar_proveedor: function () {
		$(document).on("click", ".eliminar_proveedor", function (event) {
			event.preventDefault();
			id_proveedor = $(this).data("id");
			var data = { id_proveedor: id_proveedor };
			swal
				.fire({
					title: "¿Está seguro?",
					text: "El proveedor se eliminará!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Si, eliminar",
					cancelButtonText: "No, cancelar",
				})
				.then((result) => {
					if (result.value) {
						cargar_ajax.run_server_ajax("Plataforma/eliminar_prov", data);
						Swal.fire({
							title: "Eliminado",
							text: "Se eliminó correctamente",
							icon: "success",
							timer: 2000,
							showConfirmButton: false,
							timerProgressBar: true,
						}).then((result) => {
							location.reload();
						});
						var toDelete = "#tr_" + id_proveedor;
						$(toDelete).remove();
					}
				});
		});
	},

	agregar_producto: function () {
		$(document).on("click", ".add_producto", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				//$("#modal_add_edit_productos").modal();
			});
			$("#title_add_edit_productos").html("Agregar Producto");
			$("#txt_id_producto").val("");

			var data = { id_proveedor: $(this).data("id") };

			$("#txt_id_proveedor").val(data.id_proveedor);
		});

		$("#add_edit_producto").on("submit", function (form) {
			form.preventDefault();
			var IdProv = $("#txt_id_proveedor").val();
			var IdProd = $("#txt_id_producto").val();

			if (IdProv !== "") {
				var data = {
					id_proveedor: $("#txt_id_proveedor").val(),
					producto: $("#txt_producto").val(),
					fracc_arancelaria: $("#txt_fr_arancel").val(),
				};

				cargar_ajax.run_server_ajax("Plataforma/crear_producto", data);
				swal
					.fire({
						title: "CORRECTO",
						text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
						icon: "success",
						timer: 2000,
						showConfirmButton: false,
						timerProgressBar: true,
					})
					.then((result) => {
						location.reload();
					});
			} else if (IdProd !== "") {
				var data = {
					id_producto: $("#txt_id_producto").val(),
					producto: $("#txt_producto").val(),
					fracc_arancelaria: $("#txt_fr_arancel").val(),
				};
				cargar_ajax.run_server_ajax("Plataforma/editar_producto", data);
				swal
					.fire({
						title: "CORRECTO",
						text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
						icon: "success",
						timer: 2000,
						showConfirmButton: false,
						timerProgressBar: true,
					})
					.then((result) => {
						location.reload();
					});
			}
		});
	},

	get_datos_producto: function () {
		$(document).on("click", ".edit_producto", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_add_edit_productos").modal();
			});
			$("#title_add_edit_productos").html("Editar Producto");
			$("#txt_id_proveedor").val("");

			var data = { id_producto: $(this).data("id") };
			var response = cargar_ajax.run_server_ajax(
				"Plataforma/ver_datos_editar_producto",
				data
			);

			$("#txt_id_producto").val(data.id_producto);
			$("#txt_producto").val(response.producto);
			$("#txt_fr_arancel").val(response.fracc_arancelaria);
		});
	},

	eliminar_producto: function () {
		$(document).on("click", ".closeProve", function (event) {
			event.preventDefault();
			$("#txt_id_proveedor").val("");
			$("#txt_id_producto").val("");
			$("#txt_producto").val("");
		});

		$(document).on("click", ".eliminar_producto", function (event) {
			event.preventDefault();
			id_producto = $(this).data("id");
			var data = { id_producto: id_producto };
			swal
				.fire({
					title: "¿Esta seguro de eliminar este producto?",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Si, eliminar",
				})
				.then((result) => {
					if (result.value == true) {
						cargar_ajax.run_server_ajax("Plataforma/eliminar_prod_prov", data);
						swal
							.fire({
								title: "Eliminado!",
								text: "Se elimino correctamente el puerto",
								icon: "success",
								timer: 2000,
								showConfirmButton: false,
								timerProgressBar: true,
							})
							.then((result) => {
								location.reload();
							});
					}
				});
		});
	},

	agregar_agencia: function () {
		// abrir modal y ajustar titulo de modal
		$(document).on("click", "#btnNuevaAgencia", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_nueva_agencia").modal("show");
			});
			$("#titulo_add_edit").html("Agregar Agencia");
		});
		$(document).on("click", "#btnNuevoAgente", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_add_agente").modal();
			});
		});
		// limpiar campos del modal al cerrarlo o cancelar el formulario
		$(document).on("click", ".closeNewAg", function (event) {
			event.preventDefault();
			$("#sel_Lada").val("0");
			$("#spLada").html("");
			$("#txt_telefono").attr("placeholder", "");
		});
		// agregar los datos ingresados del formulario de ediion al calculo
		$("#agregar_agencia").on("submit", function (form) {
			form.preventDefault();
			var honorarios = parseFloat($("#txt_honorarios").val().replace(/,/g, ""));
			var revalidacion = parseFloat(
				$("#txt_revalidacion").val().replace(/,/g, "")
			);
			var complementarios = parseFloat(
				$("#txt_complementarios").val().replace(/,/g, "")
			);
			var previo = parseFloat($("#txt_previo").val().replace(/,/g, ""));
			var maniobras = parseFloat(
				$("#txt_maniobras_puerto").val().replace(/,/g, "")
			);
			var desconsolidacion = parseFloat(
				$("#txt_desconsolidacion").val().replace(/,/g, "")
			);

			var idLada = $("#sel_LadaAgencia").val();
			var lada = $("#spLadaAgencia").html();
			var numero = $("#txt_telefonoAgencia").val();
			var telefono = lada + " " + numero;

			var data = {
				agencia: $("#txt_agencia").val(),
				agente: $("#txt_agente").val(),
				email: $("#txt_email").val(),
				id_lada: idLada,
				telefono: telefono,
				honorarios: honorarios,
				revalidacion: revalidacion,
				complementarios: complementarios,
				previo: previo,
				maniobras_puerto: maniobras,
				desconsolidacion: desconsolidacion,
			};
			cargar_ajax.run_server_ajax("Plataforma/crear_aa", data);
			response_agencia = cargar_ajax.run_server_ajax("Plataforma/ultima_aa");

			var data_puerto = {
				id_agencia: response_agencia.id_agencia,
				transporte: $("#txt_transporte_aa").val(),
				clave: $("#txt_clave_aa").val(),
			};
			cargar_ajax.run_server_ajax("Plataforma/add_transporte", data_puerto);

			swal
				.fire({
					title: "CORRECTO",
					text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
					icon: "success",
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				})
				.then((result) => {
					location.reload();
				});
		});

		$("#agregar_agencia_editar").on("submit", function (form) {
			form.preventDefault();
			var honorarios = parseFloat($("#txt_honorarios").val().replace(/,/g, ""));
			var revalidacion = parseFloat(
				$("#txt_revalidacion").val().replace(/,/g, "")
			);
			var complementarios = parseFloat(
				$("#txt_complementarios").val().replace(/,/g, "")
			);
			var previo = parseFloat($("#txt_previo").val().replace(/,/g, ""));
			var maniobras = parseFloat(
				$("#txt_maniobras_puerto").val().replace(/,/g, "")
			);
			var desconsolidacion = parseFloat(
				$("#txt_desconsolidacion").val().replace(/,/g, "")
			);

			var IdAgencia = $("#txtIdAgencia").val();

			var idLada = $("#sel_LadaAgencia").val();
			var lada = $("#spLadaAgencia").html();
			var numero = $("#txt_telefonoAgencia").val();
			var telefono = lada + " " + numero;

			var data = {
				id_agencia: IdAgencia,
				agencia: $("#txt_agencia").val(),
				agente: $("#txt_agente").val(),
				email: $("#txt_email").val(),
				id_lada: idLada,
				telefono: telefono,
				honorarios: honorarios,
				revalidacion: revalidacion,
				complementarios: complementarios,
				previo: previo,
				maniobras_puerto: maniobras,
				desconsolidacion: desconsolidacion,
			};
			cargar_ajax.run_server_ajax("Plataforma/editar_aa", data);
			swal
				.fire({
					title: "CORRECTO",
					text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
					icon: "success",
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				})
				.then((result) => {
					location.reload();
				});
		});
	},

	eliminar_agencia: function () {
		// eliminar la agencia agregada al calculo
		$(document).on("click", ".eliminar_agencia", function (event) {
			event.preventDefault();
			id_agencia = $(this).data("id");
			var data = { id_agencia: id_agencia };

			swalDelete
				.fire({
					title: "¿Está seguro?",
					text: "La agencia se eliminará!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText: "Si, eliminar!",
					//reverseButtons: true
				})
				.then((result) => {
					if (result.value) {
						cargar_ajax.run_server_ajax("Plataforma/eliminar_agencia", data);
						Swal.fire("Eliminado!", "Se elimino correctamente", "success");
						var toDelete = "#tr_" + id_agencia;
						$(toDelete).remove();
						location.reload();
					}
				});
		});
	},

	editar_agencia: function () {
		// abrir modal para editar la agencia, obteniendo primeramente los datos de la BD
		$(document).on("click", ".editAgencia", function (event) {
			event.preventDefault();
			jQuery.noConflict();

			$("#titulo_add_edit").html("Editar Agencia");
			jQuery(function ($) {
				$("#modal_add_editAgencia").modal();
			});
			var data = { id_agencia: $(this).data("id") };
			// traer los datos de la agencia correspondientes al ID
			var response = cargar_ajax.run_server_ajax(
				"Plataforma/datos_agencias",
				data
			);

			$("#txtIdAgencia").val(response.id_agencia);
			$("#txt_honorarios").val(response.honorarios);
			$("#txt_revalidacion").val(response.revalidacion);
			$("#txt_complementarios").val(response.complementarios);
			$("#txt_previo").val(response.previo);
			$("#txt_maniobras_puerto").val(response.maniobras_puerto);
			$("#txt_desconsolidacion").val(response.desconsolidacion);
			$("#txt_agencia").val(response.agencia);
			$("#txt_agente").val(response.agente);
			$("#txt_email").val(response.email);

			var idLada = response.id_lada;
			var tel = response.telefono;

			if (idLada === null) {
				$("#sel_Lada").val(0);
				$("#spLada").html("");
				$("#txt_telefono").val("");
			} else if (idLada == 1) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 1)");
				$("#txt_telefono").val(tel.replace("(+ 1) ", ""));
			} else if (idLada == 2) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 52)");
				$("#txt_telefono").val(tel.replace("(+ 52) ", ""));
			} else if (idLada == 3) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 66)");
				$("#txt_telefono").val(tel.replace("(+ 66) ", ""));
			} else if (idLada == 4) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 81)");
				$("#txt_telefono").val(tel.replace("(+ 81) ", ""));
			} else if (idLada == 5) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 82)");
				$("#txt_telefono").val(tel.replace("(+ 82) ", ""));
			} else if (idLada == 6) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 84)");
				$("#txt_telefono").val(tel.replace("(+ 84) ", ""));
			} else if (idLada == 7) {
				$("#sel_Lada").val(idLada);
				$("#spLada").html("(+ 86)");
				$("#txt_telefono").val(tel.replace("(+ 86) ", ""));
			}
		});
	},

	get_datos_transporte: function () {
		$(document).on("click", ".add_puerto", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_puerto").modal();
			});
			var data = { id_agencia: $(this).data("id") };
			$("#txt_p_id_agencia").val(data.id_agencia);

			$("#modal_puertoLabel").html("Agregar Puerto");
			$("#modal_puertoLabel").addClass("text-uppercase title-color");
		});

		$(document).on("click", ".edit_puerto", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_puerto").modal();
			});

			$("#modal_puertoLabel").html("Editar Puerto");
			$("#modal_puertoLabel").addClass("text-uppercase title-color");

			var data = { id_transporte: $(this).data("id") };
			var response = cargar_ajax.run_server_ajax(
				"Plataforma/ver_datos_editar_transporte",
				data
			);

			$("#txt_id_transporte").val(response.id_transporte);
			$("#txt_transporte").val(response.transporte);
			$("#txt_clave").val(response.clave);
		});

		$("#edit_add_transporte").on("submit", function (form) {
			form.preventDefault();
			var IdAgencia = $("#txt_p_id_agencia").val();
			var IdTransporte = $("#txt_id_transporte").val();

			if (IdAgencia !== "0") {
				var data = {
					id_agencia: $("#txt_p_id_agencia").val(),
					transporte: $("#txt_transporte").val(),
					clave: $("#txt_clave").val(),
				};
				cargar_ajax.run_server_ajax("Plataforma/add_transporte", data);
				swal({
					title: "CORRECTO",
					text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
					icon: "success",
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				}).then((result) => {
					location.reload();
				});
			} else if (IdTransporte !== "0") {
				var data = {
					id_transporte: $("#txt_id_transporte").val(),
					transporte: $("#txt_transporte").val(),
					clave: $("#txt_clave").val(),
				};
				cargar_ajax.run_server_ajax("Plataforma/editar_transporte", data);

				swal
					.fire({
						title: "CORRECTO",
						text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
						icon: "success",
					})
					.then((result) => {
						location.reload();
					});
			}
		});

		$(document).on("click", ".closePuerto", function (event) {
			event.preventDefault();
			$("#txt_id_transporte").val(0);
			$("#txt_p_id_agencia").val(0);
		});
	},

	add_transporte: function () {
		$("#agregar_transporte").on("submit", function (form) {
			form.preventDefault();

			var data = {
				id_agencia: $("#txt_p_id_agencia").val(),
				transporte: $("#txt_transporte").val(),
				clave: $("#txt_clave").val(),
			};
			cargar_ajax.run_server_ajax("Plataforma/add_transporte", data);
			swal
				.fire({
					title: "CORRECTO",
					text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
					icon: "success",
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				})
				.then((result) => {
					location.reload();
				});
		});
	},

	eliminar_transporte: function () {
		$(document).on("click", ".eliminar_puerto", function (event) {
			event.preventDefault();
			id_transporte = $(this).data("id");
			var data = { id_transporte: id_transporte };

			swal
				.fire({
					title: "¿Esta seguro de eliminar este puerto?",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Si, eliminar",
					cancelButtonText: "No, cancelar",
				})
				.then((result) => {
					if (result.value == true) {
						cargar_ajax.run_server_ajax("Plataforma/eliminar_transporte", data);
						swal
							.fire({
								title: "Eliminado correctamente",
								icon: "success",
								timer: 2000,
								showConfirmButton: false,
								timerProgressBar: true,
							})
							.then((result) => {
								location.reload();
							});
						var toDelete = "#tr_" + id_transporte;
						$(toDelete).remove();
					}
				});
		});
	},

	ver_datos_proyecto: function () {
		$(document).on("click", ".asignar_asesor", function (event) {
			event.preventDefault();
			var data = { id_proyecto: $(this).data("id") };
			var response = cargar_ajax.run_server_ajax(
				"Plataforma/ver_datos_editar_proyecto",
				data
			);
			$("#id_proyecto_editar").val(response.id_proyecto);
		});
		$(document).on("click", ".editar_todos_proyectos", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_editar_proyeco").modal();
			});

			var data = { id_proyecto: $(this).data("id") };

			var response = cargar_ajax.run_server_ajax(
				"Plataforma/ver_datos_editar_proyecto",
				data
			);

			$("#id_proyecto_editar").val(response.id_proyecto);
			$("#txt_nombre_proyecto_editar").val(response.Nombre_proyecto);
			if (response.id_asesor === null || response.id_asesor === "") {
				$("#sel_editar_asesor").val(0);
				$(".valNombre").removeClass("col-md-4");
				$(".valNombre").addClass("col-md-6");
				$(".valAsesor").removeClass("col-md-4");
				$(".valAsesor").addClass("col-md-6");
				$(".valStatus").removeClass("col-md-4");
				$(".valStatus").addClass("col-md-0");
				$(".valStatus").addClass("hide-button");
			} else {
				$("#sel_editar_asesor").val(response.id_asesor);
			}
			$("#sel_editar_status").val(response.id_estadoproyectos);
			status1 = $("#sel_editar_status").val();
		});
	},

	add_asesor_proyecto: function () {
		$("#form_asignar_asesor").on("submit", function (form) {
			form.preventDefault();

			var data = {
				id_proyecto: $("#id_proyecto_editar").val(),
				id_asesor: $("#sel_asignar_asesor").val(),
				Nombre_proyecto: $("#txt_nombre_proyecto").val(),
			};

			cargar_ajax.run_server_ajax("Plataforma/asignar_asesor_proyecto", data);
			swal
				.fire({
					title: "CORRECTO",
					text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
					icon: "success",
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				})
				.then((result) => {
					window.location.assign(base_url + "Plataforma/Proyectos");
				});
		});
	},

	media_proyecto: function () {
		$(document).on("click", "#mediaPDF", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalOemService").modal();
			});

			var id_proyecto = $(this).data("id");

			var data = { id_proyecto: id_proyecto };
			var oemservice = cargar_ajax.run_server_ajax(
				"Plataforma/media_proyecto",
				data
			);

			var archivo_pathI = baseUrl + oemservice.oemservice_path;
			var pdf = "";

			$("#divPDF").css("display", "");
			$("#divImg").css("display", "none");
			$("#divPDF").empty();
			$("#divImg").empty();
			pdf =
				'<embed src="' +
				archivo_pathI +
				'" frameborder="0" width="100%" height="440px">';
			$("#divPDF").append(pdf);
		});

		$(document).on("click", "#mediaIMG", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalOemService").modal();
			});

			var id_proyecto = $(this).data("id");

			var data = { id_proyecto: id_proyecto };
			var oemservice = cargar_ajax.run_server_ajax(
				"Plataforma/media_proyecto",
				data
			);

			var archivo_pathI = baseUrl + oemservice.oemservice_path;
			var img = "";

			$("#divPDF").css("display", "none");
			$("#divImg").css("display", "");
			$("#divPDF").empty();
			$("#divImg").empty();
			img =
				'<img class="img-fluid img-caroucel" src="' +
				archivo_pathI +
				'"  style="object-fit: scale-down;height: 25vh;width: 100%;">';
			$("#divImg").append(img);
		});
	},

	media_invoice: function () {
		$(document).on("click", "#pdf-icon", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalInvoice").modal();
			});
			$("#titleModal").html("Invoice");

			var id_producto_c = $(this).data("id");

			var data = { id_producto_c: id_producto_c };
			var invoice = cargar_ajax.run_server_ajax(
				"Plataforma/media_invoice_prod",
				data
			);

			var archivo_pathI = baseUrl + invoice.invoice_path;
			var pdf = "";

			$("#divPDFInvoice").css("display", "");
			$("#divImgInvoice").css("display", "none");
			$("#divPDFCheck").css("display", "none");
			$("#divPDFInvoice").empty();
			$("#divImgInvoice").empty();
			$("#divPDFCheck").empty();
			pdf =
				'<embed id="pdfInvoice" src="' +
				archivo_pathI +
				'" frameborder="0" width="100%" height="440px">';
			$("#divPDFInvoice").append(pdf);
		});
		$(document).on("click", "#img-icon", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalInvoice").modal();
			});
			$("#titleModal").html("Invoice");

			var id_producto_c = $(this).data("id");

			var data = { id_producto_c: id_producto_c };
			var invoice = cargar_ajax.run_server_ajax(
				"Plataforma/media_invoice_prod",
				data
			);

			var archivo_pathI = baseUrl + invoice.invoice_path;
			var img = "";

			$("#divPDFInvoice").css("display", "none");
			$("#divImgInvoice").css("display", "");
			$("#divPDFCheck").css("display", "none");
			$("#divPDFInvoice").empty();
			$("#divImgInvoice").empty();
			$("#divPDFCheck").empty();
			img =
				'<img id="imgInvoiceM" class="img-fluid img-caroucel" src="' +
				archivo_pathI +
				'">';
			$("#divImgInvoice").append(img);
		});
		$(document).on("click", "#imgP-icon", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalInvoice").modal();
			});
			$("#titleModal").html("Producto");

			var id_producto_c = $(this).data("id");

			var data = { id_producto_c: id_producto_c };
			var productosp = cargar_ajax.run_server_ajax(
				"Plataforma/media_producto_cp_prod",
				data
			);
			var img_path = baseUrl + productosp.img_path;
			var img = "";

			$("#divPDFInvoice").css("display", "none");
			$("#divImgInvoice").css("display", "");
			$("#divPDFCheck").css("display", "none");
			$("#divPDFInvoice").empty();
			$("#divImgInvoice").empty();
			$("#divPDFCheck").empty();
			img =
				'<img id="imgInvoiceM" class="img-fluid img-caroucel" src="' +
				img_path +
				'">';
			$("#divImgInvoice").append(img);
		});
		$(document).on("click", "#imgSp-icon", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modalInvoice").modal();
			});
			$("#titleModal").html("Producto");

			var id_producto_sp_c = $(this).data("id");

			var data = { id_producto_sp_c: id_producto_sp_c };
			var productosp = cargar_ajax.run_server_ajax(
				"Plataforma/media_producto_sp_prod",
				data
			);
			var img_path = baseUrl + productosp.img_path;
			var img = "";

			$("#divPDFInvoice").css("display", "none");
			$("#divImgInvoice").css("display", "");
			$("#divPDFCheck").css("display", "none");
			$("#divPDFInvoice").empty();
			$("#divImgInvoice").empty();
			$("#divPDFCheck").empty();
			img =
				'<img id="imgInvoiceM" class="img-fluid img-caroucel" src="' +
				img_path +
				'">';
			$("#divImgInvoice").append(img);
		});
	},

	editar_proyecto_todos: function () {
		$("#form_editar_proyecto_todo").on("submit", function (e) {
			e.preventDefault();
			var id_asesor = $("#sel_editar_asesor").val();
			if (id_asesor != 0) {
				document.getElementById("sel_editar_asesor").style.borderColor = "gray";
				var data = {
					id_proyecto: $("#id_proyecto_editar").val(),
					id_asesor: $("#sel_editar_asesor").val(),
					Nombre_proyecto: $("#txt_nombre_proyecto_editar").val(),
					id_estadoproyecto: $("#sel_editar_status").val(),
				};
				var status2 = $("#sel_editar_status").val();

				var response = cargar_ajax.run_server_ajax(
					"Plataforma/asignar_asesor_proyecto",
					data
				);
				console.log(response);
				if (response == "false") {
					// || response == undefined
					title = "Error!";
					icon = "error";
					mensaje = "No se pudo realizar la actualicación";
				} else {
					icon = "success";
					title = "Actualización de información";
					mensaje = "Se actualizo la información correctamente";
				}

				if (status1 != status2) {
					//enviar correo
					var data_correo = {
						status: status2,
						id_proyecto: $("#id_proyecto_editar").val(),
					};
					cargar_ajax.run_server_ajax(
						"Plataforma/correo_cambioStatus",
						data_correo
					);
				}

				//Validacion para finalizar el proyecto
				if (status2 == 24) {
					var data_fin = {
						id_proyecto: $("#id_proyecto_editar").val(),
						activo: 2,
					};
					cargar_ajax.run_server_ajax(
						"Plataforma/finalizar_proyecto",
						data_fin
					);
				}
				swal
					.fire({
						title: title,
						text: mensaje,
						icon: icon,
						timer: 2000,
						showConfirmButton: false,
						timerProgressBar: true,
					})
					.then((result) => {
						location.reload();
					});
			} else {
				document.getElementById("sel_editar_asesor").style.borderColor = "red";
			}
		});
	},

	insertar_detalle_proyecto: function () {
		$("#form_detalle_proyecto_asesor").on("submit", function (form) {
			form.preventDefault();
			var niv = $("#nivel_us").val();
			if (niv >= 3) {
				var sel = $("#txtIdAsesor").val();
			} else {
				var sel = $("#sel_validacion_existe_asesor").val();
			}

			if (sel != 0) {
				if (sel == undefined) {
					sel = null;
				}
				var data = {
					id_proyecto: $("#id_proyecto_editar").val(),
					nomProyecto: $("#txtNombreP").val(),
					numBl: $("#txtNumBl").val(),
					fracAran: $("#txtFraccAran").val(),
					restic: $("#txtResticciones").val(),
					id_estadoproyecto: $("#sel_status").val(),
					id_asesor: sel,
				};

				cargar_ajax.run_server_ajax("Plataforma/actualizar_proyecto", data);

				var status3 = $("#estado_ant").val();
				var status4 = $("#sel_status").val();
				if (status3 != status4) {
					//enviar correo
					var data_correo = {
						status: status4,
						id_proyecto: $("#id_proyecto_editar").val(),
					};
					cargar_ajax.run_server_ajax(
						"Plataforma/correo_cambioStatus",
						data_correo
					);
				}

				//Validacion para finalizar el proyecto
				if ($("#sel_status").val() == 24) {
					var data_fin = {
						id_proyecto: $("#id_proyecto_editar").val(),
						activo: 2,
					};
					cargar_ajax.run_server_ajax(
						"Plataforma/finalizar_proyecto",
						data_fin
					);
				}

				//Comprobación para actualizar las coordenadas
				var direccion = $("#txt_latitud").val();
				if (direccion != "") {
					var data_coordenadas = {
						id_proyecto: $("#id_proyecto_editar").val(),
						direccion: direccion,
					};
					cargar_ajax.run_server_ajax(
						"Plataforma/update_coordenadas",
						data_coordenadas
					);
				}

				swal
					.fire({
						title: "CORRECTO",
						text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
						type: "success",
						timer: 2000,
						showConfirmButton: false,
						timerProgressBar: true,
					})
					.then((result) => {
						location.reload();
					});
			} else {
				document.getElementById(
					"sel_validacion_existe_asesor"
				).style.borderColor = "red";
				document.getElementById("div_asignacion").style.display = "";
			}
		});
	},

	status_cotizacion: function () {
		const SwalStatus = Swal.mixin({
			customClass: {
				cancelButton: "btn btn-outline-danger btn-nuevo padding-buttons",
				confirmButton: "btn btn-outline-primary btn-nuevo margin-buttons",
			},
			buttonsStyling: false,
		});

		$(document).on("click", ".btnAceptar", function (event) {
			event.preventDefault();

			var data = {
				id_cotizacion: $(this).data("id"),
				activo: 3, //aceptada cliente
			};

			SwalStatus.fire({
				title: "¿Seguro?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, aceptar.",
				cancelButtonText: "Cancelar.",
			}).then((result) => {
				if (result.value) {
					cargar_ajax.run_server_ajax(
						"Plataforma/update_status_cotizacion",
						data
					);

					//rechazar las demas cotizaciones
					cargar_ajax.run_server_ajax(
						"Plataforma/update_otras_cotizaciones",
						data
					);

					swal
						.fire({
							title: "¡Listo!",
							text: "Has aceptado la cotización!",
							icon: "success",
							timer: 2000,
							showConfirmButton: false,
							timerProgressBar: true,
						})
						.then((result) => {
							location.reload();
						});
				}
			});
		});

		$(document).on("click", ".btnRecotizar_admin", function (event) {
			event.preventDefault();

			var data = {
				id_cotizacion: $(this).data("id"),
				activo: 5, //solicitud recotizar admin
			};

			SwalStatus.fire({
				title: "¿Seguro?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, aceptar.",
				cancelButtonText: "Cancelar.",
			}).then((result) => {
				if (result.value) {
					cargar_ajax.run_server_ajax(
						"Plataforma/update_status_cotizacion",
						data
					);

					swal
						.fire({
							title: "¡Listo!",
							text: "Has solicitado la recotización del pedido!",
							icon: "success",
							timer: 2000,
							showConfirmButton: false,
							timerProgressBar: true,
						})
						.then((result) => {
							location.reload();
						});
				}
			});
		});

		$(document).on("click", ".btnRecotizar", function (event) {
			event.preventDefault();

			var data = {
				id_cotizacion: $(this).data("id"),
				activo: 4, //solicitud recotizar cliente
			};

			SwalStatus.fire({
				title: "¿Seguro?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, aceptar.",
				cancelButtonText: "Cancelar.",
			}).then((result) => {
				if (result.value) {
					cargar_ajax.run_server_ajax(
						"Plataforma/update_status_cotizacion",
						data
					);

					swal
						.fire({
							title: "¡Listo!",
							text: "Has solicitado la recotización de tu pedido!",
							icon: "success",
							timer: 2000,
							showConfirmButton: false,
							timerProgressBar: true,
						})
						.then((result) => {
							location.reload();
						});
				}
			});
		});

		$(document).on("click", ".btnAceptar_admin", function (event) {
			event.preventDefault();

			var data = {
				id_cotizacion: $(this).data("id"),
				activo: 2, //aceptada_admin
			};

			//buscar si esta asignado el asesor
			var consulta = cargar_ajax.run_server_ajax(
				"Plataforma/consultaAsesorProyecto",
				data
			);

			if (consulta.id_asesor != "false") {
				SwalStatus.fire({
					title: "¿Seguro?",
					text: "¡No podrás revertir esto!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText: "Si, aceptar.",
					cancelButtonText: "Cancelar.",
				}).then((result) => {
					if (result.value) {
						cargar_ajax.run_server_ajax(
							"Plataforma/update_status_cotizacion",
							data
						);
						//agregar envio de correo
						swal
							.fire({
								title: "¡Aceptado!",
								text: "Has aceptado la cotización, ahora el cliente podrá verla!",
								icon: "success",
								timer: 2000,
								showConfirmButton: false,
								timerProgressBar: true,
							})
							.then((result) => {
								location.reload();
							});
					}
				});
			} else {
				//mensaje: primero asigne asesor
				swal.fire({
					title: "¡Proyecto sin asignar!",
					text: "Favor de asignar asesor antes",
					icon: "warning",
					timer: 4000,
					showConfirmButton: false,
					timerProgressBar: true,
				});
			}
		});

		$(document).on("click", ".btnEliminar", function (event) {
			event.preventDefault();

			var data = {
				id_cotizacion: $(this).data("id"),
				activo: 0, //Eliminar
			};

			SwalStatus.fire({
				title: "¿Seguro?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, borrar.",
				cancelButtonText: "Cancelar.",
			}).then((result) => {
				if (result.value) {
					cargar_ajax.run_server_ajax(
						"Plataforma/update_status_cotizacion",
						data
					);

					swal
						.fire({
							title: "¡Borrado!",
							text: "Tu cotización ha sido borrada!",
							icon: "success",
							timer: 2000,
							showConfirmButton: false,
							timerProgressBar: true,
						})
						.then((result) => {
							location.reload();
						});
				}
			});
		});
	},

	captura_archivo: function (argument) {
		$("#imagen").on("change", function (e) {
			var inputFile = e.currentTarget;
			file_Files_perfil = inputFile.files[0];
		});

		$(document).on("click", "#btnLimpiar", function (event) {
			$("#imagen").val("");
			$("#lblPerfil").html("Seleccionar una foto");
			file_Files_perfil = " ";
		});
	},

	editar_perfil: function () {
		$("#lblPerfil").html("Seleccionar una foto");
		$("#lblPerfil").addClass("file-placeholder");
		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this)
				.siblings(".custom-file-label")
				.addClass("selected")
				.html(fileName);
		});

		$("#form_editar_perfil").on("submit", function (form) {
			form.preventDefault();
			var id_usuario = $("#inpt_id").val();
			var data = {
				id_usuario: id_usuario,
				nombre: $("#inpt_nombre").val(),
				email: $("#input_correo").val(),
				lada: $("#LadasCelphone").val(),
				telefono: $("#celphone").val(),
			};

			response = cargar_ajax.run_server_ajax("Plataforma/editar_perfil", data);
			toastr.options = {
				closeButton: false,
				debug: false,
				newestOnTop: false,
				progressBar: true,
				positionClass: "toast-top-right",
				preventDuplicates: false,
				onclick: null,
				showDuration: "300",
				hideDuration: "1000",
				timeOut: "5000",
				extendedTimeOut: "1000",
				showEasing: "swing",
				hideEasing: "linear",
				showMethod: "fadeIn",
				hideMethod: "fadeOut",
			};
			toastr.options.onHidden = function () {
				// this will be executed after fadeout, i.e. 2secs after notification has been show
				location.reload();
			};

			if (response == (false || undefined)) {
				toastr.error("No se pudo realizar la actualicación", "Error!");
			} else {
				toastr.success(
					"Se actualizo la información correctamente",
					"Actualización Correcta"
				);
			}

			if (file_Files_perfil != " ") {
				frmData_perfil.append("id_usuario", id_usuario);
				frmData_perfil.append("imagen", file_Files_perfil);
				resp = cargar_ajax2.run_server_ajax2(
					"Plataforma/enviar_img_perfil",
					frmData_perfil
				);
				if (resp == undefined || resp.status == "false") {
					if (resp == undefined) {
						toastr.error(
							"No se pudo subir la imagen, error desconocido",
							"Error!"
						);
					} else if (resp.info == "carga") {
						toastr.error(
							"No se pudo subir la imagen, error al subir",
							"Error!"
						);
					} else if (resp.info == "extension") {
						toastr.error(
							"No se pudo subir la imagen, extension invalida",
							"Error!"
						);
					}
				} else {
					toastr.success(
						"Se actualizo correctamente la imagen",
						"Actualización Correcta"
					);
				}
			}
		});
	},

	agentes: function () {
		$("#crear_agente").on("submit", function (form) {
			form.preventDefault();

			var data = {
				email: $("#txt_email_agente").val(),
				nombre: $("#txt_nombre").val(),
				contrasena: $("#txt_contrasena").val(),
				id_nivelusuario: 5,
				telefono: $("#txt_telefonoAgente").val(),
				lada: $("#sel_LadaAgente").val(),
			};

			var response = cargar_ajax.run_server_ajax(
				"Plataforma/crear_agente",
				data
			);

			if (response == undefined) {
				title = "¡ERROR!";
				icon = "error";
				mensaje = "NO SE PUDO REALIZAR EL REGISTRO";
			} else {
				//consulta last id
				var id_us = cargar_ajax.run_server_ajax("Plataforma/last_id_agente");
				var id_nuevo = parseInt(id_us.id_usuario);

				//data para insertar en relacion
				var data2 = {
					id_agencia: $("#txt_id_agencia").val(),
					id_usuario: id_nuevo,
				};

				var response2 = cargar_ajax.run_server_ajax(
					"Plataforma/insert_relacion",
					data2
				);

				if (response2 == undefined) {
					title = "¡ERROR!";
					icon = "error";
					mensaje = "NO SE PUDO REALIZAR EL REGISTRO EN LA AGENCIA";
				} else {
					icon = "success";
					title = "CORRECTO";
					mensaje = "SE AGREGO CORRECTAMENTE EL USUARIO";
				}
			}

			swal
				.fire({
					title: title,
					text: mensaje,
					icon: icon,
					timer: 2000,
					showConfirmButton: false,
					timerProgressBar: true,
				})
				.then((result) => {
					location.reload();
				});
		});
	},

	eliminar_proyecto: function () {
		$(document).on("click", ".eliminar_proyecto", function (event) {
			event.preventDefault();

			var data = {
				id_proyecto: $(this).data("id"),
				activo: 0,
			};
			//swal
			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					cancelButton: "btn btn-outline-danger btn-nuevo padding-buttons",
					confirmButton: "btn btn-outline-primary btn-nuevo margin-buttons",
				},
				buttonsStyling: false,
			});
			swalWithBootstrapButtons
				.fire({
					title: "¿Seguro que deseas eliminar este proyecto?",
					text: "¡No podrás revertir esto!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Si, aceptar.",
					cancelButtonText: "Cancelar.",
				})
				.then((result) => {
					if (result.value) {
						cargar_ajax.run_server_ajax("Plataforma/finalizar_proyecto", data);
						location.reload();
					}
				});
		});
	},

	pagos: function () {
		$(document).on("click", "#btnPagar", function (event) {
			event.preventDefault();
			jQuery.noConflict();
			jQuery(function ($) {
				$("#modal_pago").modal("show");
			});
		});
	},

	get_pdfCotizacion: function () {
		$(document).on("click", "#btnDescargarCotizacion", function (e) {
			e.preventDefault();
			id_documento = $(this).data("id");
			var data = { id_documento: id_documento };
			var get_path = cargar_ajax.run_server_ajax(
				"Plataforma/get_pathCotizacion",
				data
			);
			var path = get_path.archivo_path;

			var data_f = { id_proyecto: get_path.id_proyecto };
			var get_folio = cargar_ajax.run_server_ajax(
				"Plataforma/get_folio",
				data_f
			);
			var folio = get_folio.a_registro + "_" + get_folio.folio;

			let a = document.createElement("a");
			a.href = baseUrl + path;
			a.download = "cotizacion_proyecto_" + folio;
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
		});
	},
};

jQuery(document).ready(function () {
	plataforma.get_pdfCotizacion(this);
	plataforma.add_asesor_proyecto(this);
	plataforma.media_proyecto(this);
	plataforma.media_invoice(this);
	plataforma.ver_datos_proyecto(this);
	plataforma.editar_proyecto_todos(this);
	plataforma.insertar_detalle_proyecto(this);
	plataforma.status_cotizacion(this);
	plataforma.editar_perfil(this);
	plataforma.editar_agencia(this);
	plataforma.get_datos_transporte(this);
	plataforma.eliminar_transporte(this);
	plataforma.eliminar_agencia(this);
	plataforma.agregar_agencia(this);
	plataforma.agregar_proveedor(this);
	plataforma.get_proveedor(this);
	plataforma.eliminar_proveedor(this);
	plataforma.agregar_producto(this);
	plataforma.get_datos_producto(this);
	plataforma.eliminar_producto(this);
	plataforma.agentes(this);
	plataforma.captura_archivo(this);
	plataforma.eliminar_proyecto(this);
	plataforma.pagos(this);
});
