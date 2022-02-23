<?php
$level = $this->session->userdata('nivel');
?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Póliticas de privacidad</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <?php if ($level == 1) { ?>
                            <a href="<?= base_url() ?>Mantenimiento/DashboardRoot"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 2) { ?>
                            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 3) { ?>
                            <a href="<?= base_url() ?>Plataforma/DashboardAsesor"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 4) { ?>
                            <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 5) { ?>
                            <a href="<?= base_url() ?>Plataforma/DashboardAgente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } ?>
                    </li>
                    <li class="breadcrumb-item active">Póliticas de privacidad</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div style="padding: 0rem 2rem 1rem 2rem;">
            <div style="padding: 2rem;">
                <h5 class="title-color">INTRODUCCIÓN</h5>
                <p>
                    A los Usuarios (como se definen posteriormente), les informamos que el siguiente Aviso de Privacidad, les es aplicable por el simple uso o acceso a cualquiera de las páginas, aplicaciones web y móviles, softwares y, aplicaciones en general, que integran el Portal de <a href="https://www.reachmx.com">www.reachmx.com</a> (en adelante y, conjunta e indistintamente, el "Portal"), por lo que entenderemos que lo acepta y acuerda en obligarse en su cumplimiento. <strong>En caso de que no esté de acuerdo con el Aviso de Privacidad y/o con los Términos y Condiciones a su disposición, deberá abstenerse de acceder o utilizar el Portal.</strong>
                    <br><br>
                    El Usuario, entendido como aquella persona que realiza el uso o accede, mediante equipo de cómputo y/o cualquier equipo de comunicación o dispositivo, al Portal (en adelante el “Usuario”), acepta plena y sin reserva todas y cada una de las disposiciones incluidas en el presente Aviso de Privacidad.
                </p>
                <h5 class="title-color">1. RESPONSABLE DEL TRATAMIENTO DE SUS DATOS PERSONALES.</h5>
                <p>
                    Para Reachmx Trade Solutions SAPI de CV (en adelante la “Empresa”) la seguridad de los Usuarios es nuestra prioridad, por lo que protegemos sus datos personales mediante el uso, aplicación y mantenimiento de altas medidas de seguridad técnicas, físicas y administrativas
                    <br><br>
                    Como Usuario, usted tiene la oportunidad de escoger entre una amplia gama de productos y servicios a través de nuestro Portal, sabiendo que sus datos personales estarán protegidos y serán tratados de manera confidencial. Les informamos que el RESPONSABLE de recabar y dar tratamiento y/o utilizar los datos personales que el Usuario proporcione a través del Portal, es la Empresa, así como sus subsidiarias, asociadas, sociedades controladoras y afiliadas.
                </p>
                <h5 class="title-color">2. DOMICILIO DEL RESPONSABLE.</h5>
                <p>
                    Para efectos del presente aviso de privacidad, la Empresa señala, individualmente, como su domicilio, el ubicado en Zacatecas 73 int. B, 5 de Mayo, Hermosillo, Sonora, C. P. 83010
                </p>
                <h5 class="title-color">3. DATOS PERSONALES QUE PUEDEN SER RECOLECTADOS. </h5>
                <p>
                    Los datos personales que la Empresa puede recopilar del Usuario al utilizar el Portal y/o contratar nuestros servicios y productos, son los siguientes:
                    <p style="margin-left: 4rem;">
                        <strong>I.</strong> Nombre, correo electrónico, número de teléfono<br>
                        <strong>II.</strong> Mercancia que desee importar, cantidad y especificaciones<br>
                        <strong>III.</strong> Logotipos y/o marca de empresa (cliente)<br>
                        <strong>IV.</strong> Datos de Facturación (RFC, domicilio fiscal,etc)<br>
                    </p>
                </p>
                <h5 class="title-color">4. FINALIDADES DEL TRATAMIENTO DE SUS DATOS PERSONALES. </h5>
                <p>
                    Los datos personales que la Empresa recabe serán utilizados para atender las siguientes finalidades:
                    <p style="margin-left: 4rem;">
                        <strong>I.</strong> Garantizar la calidad de nuestro servicio, Búsqueda exitosa en países extranjeros del producto que requiere importar , Contacto para aclaración de dudas , Campañas de publicidad por medios digitales.<br>
                        <strong>II.</strong> Para integrar expedientes, bases de datos y sistemas necesarios para llevar a cabo las operaciones y servicios correspondientes; (ii) Para reclamar la entrega de premios y/o promociones; (iii) Para llevar a cabo análisis internos;<br>
                        <strong>III.</strong> De manera adicional, se podrán utilizar sus datos personales para las siguientes finalidades secundarias: (i) Mercadotecnia, publicidad y prospección comercial; (ii) Ofrecerle, en su caso, otros productos y servicios propios de la Empresa o de cualquiera de sus afiliadas, subsidiarias, sociedades controladoras, asociadas, comisionistas o sociedades; (iii) Remitirle promociones de otros bienes, servicios y/o productos; (iv) Para realizar análisis estadísticos, de generación de modelos de información y/o perfiles de comportamiento actual y predictivo y, (v) Para participar en encuestas, sorteos y promociones.
                    </p>
                </p>
                <h5 class="title-color">5. OPCIONES Y MEDIOS PARA LIMITAR EL USO O DIVULGACIÓN DE LOS DATOS.</h5>
                <p>
                    La Empresa tiene implementadas medidas de seguridad administrativas, técnicas y físicas para proteger sus datos personales, mismas que igualmente exigimos sean cumplidas por los proveedores de servicios que contratamos. Usted podrá limitar el uso o divulgación de sus datos personales enviando un correo electrónico a legal@reachmx.com indicándonos en el cuerpo del correo su nombre completo y que dato desea que no sea divulgado, de proceder su solicitud, se le registrará en el listado de exclusión.
                </p>
                <h5 class="title-color">6. MEDIOS PARA EJERCER LOS DERECHOS DE ACCESO, RECTIFICACIÓN, CANCELACIÓN U OPOSICIÓN (DERECHOS ARCO).</h5>
                <p>
                    Puede enviar un correo electrónico a legal@reachmx.com, en cualquier momento, para ejercer sus Derechos de Acceso, Rectificación, Cancelación u Oposición (“Derechos ARCO”). Para ejercer los Derechos ARCO, usted (o su representante legal), deberá presentar la solicitud, identificándose con la siguiente documentación:
                    <p style="margin-left: 4rem;">
                        <strong>I.</strong> Nombre del usuario o titular. <br>
                        <strong>II.</strong> Domicilio del usuario o titular u otro medio para comunicarle la respuesta a su solicitud.<br>
                        <strong>III.</strong> Documentos que acrediten su identidad (IFE/INE o pasaporte) y, en su caso, los documentos que acrediten la representación legal del solicitante.<br>
                        <strong>IV.</strong> Una descripción de la información / los datos sobre los que está tratando de ejercer sus derechos ARCO y los derechos que le gustaría ejercer.<br>
                    </p>
                    <p>
                        Si uno o más de los documentos mencionados anteriormente no están incluidos, y/o los documentos tienen errores u omisiones, la Empresa le notificará dentro de los 3 días hábiles posteriores a la recepción de la solicitud y le pedirá los documentos faltantes y/o las correcciones pertinentes; tendrá 5 días hábiles a partir de esa notificación para proporcionar la información actualizada, de lo contrario, la solicitud se entenderá como no presentada.
                    </p>
                </p>
                <h5 class="title-color">7. TRANSFERENCIA DE DATOS PERSONALES. </h5>
                <p>
                    La Empresa podrá divulgar sus datos personales a aquellos terceros que, en virtud de los servicios y productos ofrecidos, necesiten conocerlos para cumplir cabalmente con los mismos.
                    <br><br>
                    Asimismo, la Empresa puede divulgar su información a las autoridades competentes en términos de la legislación aplicable; cualquier transferencia de sus datos personales sin consentimiento se realizará de acuerdo con el Artículo 37 de la LFPDPPP.
                </p>
                <h5 class="title-color">8. WEB BEACONS.</h5>
                <p>
                    La Empresa, podrá o no, utilizar tecnologías de seguimiento tales como web beacons, similares a las cookies, para recabar datos sobre sus visitas en el Portal; éstas son pequeñas imágenes electrónicas incrustadas en el contenido web o mensajes de correo electrónico, las cuales no se encuentran normalmente visibles para los Usuarios y que nos permiten generar contenidos casi personalizados para ofrecerle una mejor experiencia cuando utilice nuestro Portal.
                    <br><br>
                    En caso de no estar de acuerdo con cualquiera de las condiciones aquí establecidas, el Usuario siempre podrá cambiar la configuración de su navegador.
                </p>
                <h5 class="title-color">9. MODIFICACIONES AL AVISO DE PRIVACIDAD.</h5>
                <p>
                    El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas, entre otras cosas, por nuevos requerimientos legales; necesidades propias de la Empresa, por los productos o servicios que ofrecemos; por nuestras prácticas de privacidad; por cambios en nuestro modelo de negocio, o por otras causas.
                    <br><br>
                    Cualquier modificación al presente aviso de privacidad le será notificada a través de cualquiera de los siguientes medios: un comunicado por escrito enviado a su domicilio; por el correo electrónico que señale; un mensaje a su teléfono móvil; un mensaje dado a conocer a través del Portal o de cualquier medio electrónico que utilice para celebrar operaciones; o bien, en periódicos de amplia circulación el domicilio social de la Empresa.
                </p>
            </div>
        </div>