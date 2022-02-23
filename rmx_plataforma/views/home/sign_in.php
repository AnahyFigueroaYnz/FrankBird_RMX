<title>ReachMx</title>
<label id="baseURL" style="display: none"><?= base_url() ?></label>
<div class="modal_wreppper" id="filesModal">
    <div class="animation_box">
        <a href="" class="modal_close"><i class="icon_close"></i></a>
        <div class="files_box navbar">
        </div>
    </div>
</div>
<div class="body_wrapper">
    <section class="sign_in_area">
        <input type="hidden" value="<?= base_url() ?>" id="LogBaseURL">
        <div class="sign_info">
            <div class="row">
                <div class="col-sm-12 col-md-6 content_s">
                    <div class="sign_info_contents">
                        <div class="dvIntro">
                            <h3 id="crearSubtitulo1" class="f_p f_400 mb_30"></h3>
                            <h2 id="crearTitulo1" class="f_p f_400 mb_45"></h2>
                            <ul class="list-unstyled">
                                <li><i class="ti-check"></i> <p id="crearTexto1" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                                <li><i class="ti-check"></i> <p id="crearTexto2" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                                <li><i class="ti-check"></i> <p id="crearTexto3" style="color: #fff; font-size: 17px; font-weight: 400; line-height: 33px; display: inline-flex;"></p></li>
                            </ul>
                        </div>
                        <div class="sign_action">
                            <a id="crearbtnIngresar" href="<?= base_url() ?>Login" type="button" class="btn_threes btn_signin"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 form_s">
                    <div class="login_info text-center">
                        <a href="<?= base_url() ?>">
                            <img class="logo_x1" src="<?= base_url() ?>template_home/img/logo.png">
                            <img class="logo_x2" src="<?= base_url() ?>template_home/img/logo_x.png">
                        </a>
                        <form class="login-form sign-in-form text-justify" id="agregar_cliente" autocomplete="off">
                            <div class="dvForm">
                                <div class="form-row">
                                    <div class="form-group sign text_box col-12" id="divName">
                                        <label id="crearTexto4" class="f_p f_400"></label>
                                        <input type="text" class="form-control" id="input_name" name="input_name" placeholder="" data-error="#errorName" required onkeyup="signValid()">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-row col-sm-12 col-lg-6">
                                        <div class="form-group sign group_box col-12" id="divPhone">
                                            <label id="crearTexto5" class="f_p f_400"></label>
                                            <div class="two_box">
                                                <span class="spContLada">
                                                    <select class="custom-select" id="sel_Lada" name="sel_Lada" data-error="#errorPhone" required>
                                                        <?php if ($DATA_LADAS != FALSE) {
                                                            foreach ($DATA_LADAS->result() as $row) {
                                                                $lad = $row->lada; ?>
                                                                <?php if ($row->id_lada == 2) { ?>
                                                                    <option value="<?= $row->id_lada ?>" selected><?= $row->abrev; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $row->id_lada ?>"><?= $row->abrev; ?></option>
                                                        <?php   }
                                                            }
                                                        } ?>
                                                    </select>
                                                    <span class="input-group-text span-lada" id="spLada" style="display: none;"></span>
                                                </span>
                                                <span class="spContTel">
                                                    <input type="text" class="form-control" id="input_phone" name="input_phone" placeholder="(+ 52) (662) 000 0000" data-error="#errorPhone" required>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row col-sm-12 col-lg-6">
                                        <div class="form-group sign text_box col-12" id="divEmail">
                                            <label id="crearTexto6" class="f_p f_400"></label>
                                            <input type="email" class="form-control" id="input_correo" name="input_correo" placeholder="hola@reachmx.com" data-error="#errorEmail" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-row col-sm-12 col-lg-6">
                                        <div class="form-group sign text_box col-12" id="divPassword">
                                            <label id="crearTexto7" class="f_p f_400"></label>
                                            <div class="two_box">
                                                <span style="width: 100%;">
                                                    <input type="password" class="form-control" id="input_password" name="input_password" placeholder="******" data-error="#errorPassword" required>
                                                </span>
                                                <span class="spPassword">
                                                    <i id="eyePassword" class="fa fa-eye showpwd" onClick="showPwd()"> </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row col-sm-12 col-lg-6">
                                        <div class="form-group sign text_box col-12" id="divConfPass">
                                            <label id="crearTexto8" class="f_p f_400"></label>
                                            <div class="two_box">
                                                <span style="width: 100%;">
                                                    <input type="password" class="form-control" id="input_password_confirm" name="input_password_confirm" placeholder="******" data-error="#errorConfPass" required>
                                                </span>
                                                <span class="spConfPass">
                                                    <i id="eyeConfPass" class="fa fa-eye showconfpwd" onClick="showConfPwd()"> </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group extra">
                                    <div id="divTyC">
                                        <label style="line-height: 15px;">
                                            <input type="checkbox" id="chkTyC" name="chkTyC" data-error="#errorTyC" required>
                                            <span id="crearTexto9"></span><span id="crearTexto10" class="files_TermConds"></span>
                                            <span id="crearTexto11"></span> <span id="crearTexto12" class="files_Privacy"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="login_action text-center">
                                <button id="crearbtnCrear" type="submit" class="btn_threes"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>