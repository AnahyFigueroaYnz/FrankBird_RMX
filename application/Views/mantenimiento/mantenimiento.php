<!DOCTYPE html>
<html style="height: auto;">
    <head>
        <title>ReachMx</title>
        <!-- icono reachmx-->
        <link href="<?= base_url() ?>favicon.ico" rel="shortcut icon" type="image/x-icon">
        <!-- font awesome icons -->
        <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
        <!--Bootstrap link-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Responsivo -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!--CSS GLOBAL-->
        <link rel="stylesheet" href="<?= base_url()?>css/global.css">
    </head>
    <body>
        <style>
            .margen-global{
                margin-top: 5rem;
            }
            .margen-gif{
                margin-top: 3rem;
            }
            .marge-logo{
                height: 80px;
                
            }
            .prin-text{
                margin-bottom: .5rem;
                margin-top: 1rem;
                font-size: 30px;
                line-height: 2;
                font-weight: 500;
                color: #5a5959;
            }
            .sec-text{
                width: 30rem;
            }
        </style>

        <div class="container">
            <div class="row no-gutter d-flex justify-content-around">
                <div class="col-12">
                    <div class="row no-gutter d-flex justify-content-around margen-global">
                        <div class="col-lg-5 col-md-5 col-sm-10 text-center">
                            <div class="card-body">
                                <img src="<?= base_url() ?>resources/gif_mantenimiento.gif" class="margen-gif img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-10">
                            <div class="card-body">
                                <img src="<?= base_url() ?>resources/logos/logo_footer.svg" class="marge-logo img-fluid">
                                <p class="prin-text">¡Lamentamos las molestias!</p>
                                <p class="sec-text">El modulo al que trata de ingresar se encuentra disponible temporalmente, estamos trabajando en ello, disculpe los inconvenientes, pronto se encontrará disponible nuevamente</p>
                                <a href="<?= base_url() ?>Home"><i class="fas fa-arrow-left"></i> Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
    </body>

</html>