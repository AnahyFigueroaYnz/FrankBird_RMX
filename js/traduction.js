var drop = '';
var myjson;
var getUrl = window.location;
var baseUrl = "https://" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
var pathname = getUrl.pathname.split('/')[3];
//estas dos variables comentadas son para la version up
// var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
// var pathname = getUrl.pathname.split('/')[2];
var js = "";
var lenguageJson; //esta variable sirve para definir si el array que se utilizara, en o es, simplifica el codigo
var esen;   //esta variable sirve para definir el idioma y utilizarlo en simplificar el codigo de las url para redirecciones
	/*
		este if es para declarar el inicio en español y/o volver a ponerlo en el idioma anteriormente seleccionado.
		si el hash esta vacio, si el item lenguage es null o su valor es igual a es entra y redefine la variabe 
		lenguage y el hash en español
	*/
	if (window.location.hash == "" || window.localStorage.getItem("Lenguage") == (null || 'es')) {
		location.hash = 'es';
		window.localStorage.setItem("Lenguage", "es");
	}else if (window.localStorage.getItem("Lenguage") ==='en'){
		location.hash = 'en';
		window.localStorage.setItem("Lenguage", "en");
	}


// ifrmae del mapa de la oficina de mexico
var reach = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3486.450764913214!2d-110.95029088490699!3d29.092370782238632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ce858f714cee0d%3A0x29010f6b3a544538!2sReachmx%20Trade%20Solutions!5e0!3m2!1ses!2smx!4v1614636967516!5m2!1ses!2smx" width="300" height="120" style="border: 0" allowfullscreen="" loading="lazy"></iframe>';
$(document).ready(function () {
	if (pathname === 'Servicios' || pathname === 'Cotizador' || pathname === 'FAQ' || pathname === 'Contactanos' ||
		pathname === "" || pathname === "Ingresar" || pathname === "Crear_Cuenta" || pathname === "Recuperar_Cuenta" ||
		pathname === "Terminos_Condiciones" || pathname === "Politica_Privacidad") {
		js = "../js/language.json";
	} else {
		js = "js/language.json";
	}

	$.getJSON("" + js + "", function (json) {
		myjson = json;
		if (window.location.hash) {
			if (window.location.hash === '#es' || window.localStorage.getItem("Lenguage") == "es") {
				lenguageJson = myjson.es;
				esen = "#es";
				$('#dpleng').html('<i class="flag-icon flag-icon-mx"></i>');
				$('#es').addClass('active');
				$('#en').removeClass('active');
				$('#es').html('<i class="flag-icon flag-icon-mx"></i><span> Español</span>');
				$('#en').html('<i class="flag-icon flag-icon-us"></i><span> Ingles</span>');

				//bandera footer
				$("#FooterIdioma").html("Español");
				$("#FooterIdiomaBandera").attr("class", "flag-icon-mx");
				$("#footerOfficeUsa").remove();
				if (pathname === 'Servicios') {
					$("#serviciosImgContenedor").attr("src", baseUrl + "template_home/resources/banners/header/bannermx.png");
				}
				//direcciones
				var mapEs = '<li style="margin-bottom: 5px">' +
					'<a id="ftOffice1" href="" target="_blank" rel="noopener noreferrer" class="d-flex">' +
					'<img src="" id="flagOffice1" class="img-fluid iFlags">' +
					'<span class="w-100">' +
					'<p class="mb-0" id="footerOffice1"></p>' +
					'</span>' +
					'</a>' +
					'</li>' +
					'<li>' +
					reach +
					'</li>';

				$('#listMap').html(mapEs);

				$("#ftOffice1").attr("href", "https://g.page/reachmx?share"); //direccion hmo
				$("#flagOffice1").attr("src", baseUrl + "template_home/resources/icons/0-flag-mx.png"); //direccion hmo bandera
				$("#ftOffice2").attr("href", "https://goo.gl/maps/58Wzx4HW5vuDJyhC7"); //direccion gdl
				$("#flagOffice2").attr("src", baseUrl + "template_home/resources/icons/0-flag-mx.png"); //direccion gdl bandera
				$("#ftOffice3").attr("href", "https://goo.gl/maps/Dnd2CXqMFJ78BhrW6"); //direccion usa
				$("#flagOffice3").attr("src", baseUrl + "template_home/resources/icons/0-flag-us.png"); //direccion de usa bandera
				$("#ftOffice4").attr("href", "https://goo.gl/maps/UJGXFcUJGXSzj81EA"); //direccion hgk
				$("#flagOffice4").attr("src", baseUrl + "template_home/resources/icons/0-flag-ch.png"); //direccion hkg bandera
			} else if (window.location.hash === '#en' || window.localStorage.getItem("Lenguage") == "en") {
				lenguageJson = myjson.en;
				esen = "#en";
				$('#dpleng').html('<i class="flag-icon flag-icon-us"></i>');
				$('#es').removeClass('active');
				$('#en').addClass('active');
				$('#es').html('<i class="flag-icon flag-icon-mx"></i><span> Spanish</span>');
				$('#en').html('<i class="flag-icon flag-icon-us"></i><span> English</span>');

				//bandera footer
				$("#FooterIdioma").html("English");
				$("#FooterIdiomaBandera").attr("class", "flag-icon-us");
				if (pathname === 'Servicios') {
					$("#serviciosImgContenedor").attr("src", baseUrl + "template_home/resources/Recurso_5.png");
				}
				//direcciones
				var mapEn = '<li style="margin-bottom: 13px">' +
					reach +
					'</li>' +
					'<li>' +
					'<a id="ftOffice4" href="" target="_blank" rel="noopener noreferrer" class="d-flex">' +
					'<img src="" id="flagOffice1" class="img-fluid iFlags">' +
					'<span class="w-100">' +
					'<p class="mb-0" id="footerOffice1"></p>' +
					'</span>' +
					'</a>' +
					'</li>';

				$('#listMap').html(mapEn);

				$("#ftOffice1").attr("href", "https://g.page/reachmx?share"); //direccion hmo
				$("#flagOffice1").attr("src", baseUrl + "template_home/resources/icons/0-flag-mx.png"); //direccion hmo bandera
				$("#ftOffice2").attr("href", "https://goo.gl/maps/Dnd2CXqMFJ78BhrW6"); //direccion de usa
				$("#flagOffice2").attr("src", baseUrl + "template_home/resources/icons/0-flag-us.png"); //direccion de usa bandera
				$("#ftOffice3").attr("href", "https://goo.gl/maps/UJGXFcUJGXSzj81EA"); //direccion hkg
				$("#flagOffice3").attr("src", baseUrl + "template_home/resources/icons/0-flag-ch.png"); //direccion hkg bandera
				$("#ftOffice4").attr("href", "https://goo.gl/maps/58Wzx4HW5vuDJyhC7"); //direccion gdl
				$("#flagOffice4").attr("src", baseUrl + "template_home/resources/icons/0-flag-mx.png"); //direccion gdl bandera
			}

			// URL
			$('#navimglogo').prop('href', '' + baseUrl + esen);
			$('#navInicio').prop('href', '' + baseUrl + esen);
			$('#navServicios').prop('href', '' + baseUrl + 'Home/Servicios' + esen);
			$('#navCotizador').prop('href', '' + baseUrl + 'Home/Cotizador' + esen);
			$('#navFAQ').prop('href', '' + baseUrl + 'Home/FAQ' + esen);
			$('#navContacto').prop('href', '' + baseUrl + 'Home/Contactanos' + esen);
			$('#navbtnIngresar').prop('href', '' + baseUrl + 'Home' + esen);
			$('#iniciobtnIniciar').prop('href', '' + baseUrl + 'Home' + esen);
			$('#iniciobtnCrearCuenta').prop('href', '' + baseUrl + 'Home/Crear_Cuenta' + esen);
			$('#ingresarbtnCrear').prop('href', '' + baseUrl + 'Home/Crear_Cuenta' + esen);
			$('#ingresarTexto6').prop('href', '' + baseUrl + 'Home/Recuperar_Cuenta' + esen);
			$('#recuperarLogo').prop('href', '' + baseUrl + '/' + esen);

			//Textos
			for (var k in lenguageJson) {
				//agrega el html (lenguageJson[k]) al id (k)
				$("#" + k + "").html(lenguageJson[k]);

				//Solicitud de no mostrar financiamiento en version ingles
				if (lenguageJson[k] == " ") {
					$("#" + k + "").remove();
				}
			}

			//Solicitud de no mostrar financiamiento en version ingles
			/*if (esen == "#en") {
				$("#faqPagobtn4").remove();
			}*/

		}

	});
});

$(document).on('click', '#es', function (event) {
	event.preventDefault();

	location.hash = 'es';
	window.localStorage.setItem("Lenguage", "es");
	location.reload(true);
});

$(document).on('click', '#en', function (event) {
	event.preventDefault();

	location.hash = 'en';
	window.localStorage.setItem("Lenguage", "en");
	location.reload(true);
});
