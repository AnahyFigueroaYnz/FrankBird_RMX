<title>ReachMx</title>
<div class="modal_wreppper" id="filesModal">
    <div class="animation_box">
        <a href="" class="modal_close"><i class="icon_close"></i></a>
        <div class="files_box navbar">
        </div>
    </div>
</div>
<div class="body_wrapper log">
    <input type="hidden"  id="idUser" value="">
    <label id="baseURL" style="display: none"><?= base_url() ?></label>
    <section class="sign_in_area">
        <div class="sign_info">
            <div class="row">
                <div class="col-sm-12 col-md-6 content">
                    <div class="sign_info_content">
                        <h3 id="ingresarSubTitulo1" class="f_p f_300 mb_50"></h3>
                        <h2 id="ingresarTitulo1" class="f_p f_400 mb_45"></h2>
                        <ul class="list-unstyled mb-0">
                            <li><i class="ti-check"></i> <p id="ingresarTexto1" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                            <li><i class="ti-check"></i> <p id="ingresarTexto2" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                            <li><i class="ti-check"></i> <p id="ingresarTexto3" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                        </ul>
                        <div class="sign_action">
                            <a id="ingresarbtnCrear" href="<?= base_url() ?>Signin" type="button" class="btn_three btn_sign"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 form">
                    <div class="login_info">
                        <a href="<?= base_url() ?>">
                            <img class="logo" src="<?= base_url() ?>template_home/img/logo.png">
                            <img class="logo_x" src="<?= base_url() ?>template_home/img/logo_x.png">
                            <img class="logo_x2" src="<?= base_url() ?>template_home/img/logo_x2.png">
                        </a>
                        <form class="login-form sign-in-form text-justify mt_90" id="login" autocomplete="off">
                            <div class="form-group text_box">
                                <label id="ingresarTexto4" class="f_p text_c f_400"></label>
                                <input type="text" required class="form-control" id="email" name="email" placeholder="hola@reahmx.com">
                            </div>
                            <div class="form-group text_box m-0">
                                <label id="ingresarTexto5" class="f_p f_400"></label>
                                <div class="two_box">
                                    <span style="width: 100%;">
                                        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="******" required>
                                    </span>
                                    <span class="spLoginPass">
                                        <i id="eyeLoginPass" class="fa fa-eye showpwd" onClick="showLoginPwd()"> </i>
                                    </span>
                                </div>
                            </div>
                            <div class="extras mt-30 mb_45">
                                <div class="forgotten-password">
                                    <a id="ingresarTexto6" href="<?= base_url() ?>Recovery"></a>
                                </div>
                            </div>
                            <div id="alert_notice" class="alert notice sec_hidden">
                                <div class="alert_body">
                                    <i class="icon-volume-2"></i>
                                    <p id="ingresarTexto7"></p>
                                    <div class="alert alert_valid">
                                        <input type="checkbox" id="chkTyC" name="chkTyC" required="">
                                        <span>
                                            <p id="ingresarTexto8"></p> <span id="ingresarTexto9" class="files_TermConds"></span>
                                            <p id="ingresarTexto10"></p> <span id="ingresarTexto11" class="files_Privacy"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="login_action text-center">
                                <button id="btn_ingresar" type="submit" class="btn_three"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>