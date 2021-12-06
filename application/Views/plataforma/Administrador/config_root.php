<?php   
    $obj_version = $this->versiones->get_version();
    $comprobacion = 0;
    $num_controladores = 0;

  if ($data_controladores != FALSE) {
    foreach ($data_controladores->result() as $row) {
      $num_controladores++;
      if ($row->activo == 1) {
        $comprobacion++;
      }
    }
  } 
?>

<style type="text/css">
 .card{
    border:none;
    background: transparent;
    width: 1100px;
      box-shadow: 0 0 0px rgba(0,0,0,.125), 0 0px 0px rgba(0,0,0,.2);
      margin-bottom: 1rem;
  }
 /* The switch - the box around the slider */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #de0707;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #197b00;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #197b00;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Modulo mantenimiento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/DashboardAdministrador"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active">Modulo mantenimiento</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>

<div class="row" >
  <div class="col-12 d-flex justify-content-around align-items-center">
    <div class="card" style="width: 1100px; background: transparent; border: none;">
      <div class="card-body" >
        
        <div class="row">             
          <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center" >
            <form id="frm_status_mantenimiento_a" name="frm_status_mantenimiento_a" class="form-horizontal" method="POST" role="form">
              <label for="inpt_mant_all" >Estatus del mantenimiento: </label>
              <label class="switch">
                <?php
                  if ($num_controladores == $comprobacion) {
                    echo '<input type="checkbox" checked name="inpt_mant_all" id="inpt_mant_all">';
                  }else{
                    echo '<input type="checkbox" name="inpt_mant_all" id="inpt_mant_all">';
                  }
                ?>
                <span class="slider"></span>
              </label>
            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
            <label>Version actual: <?=$obj_version->version;?></label>
          </div>
        </div>
        <br>
        <div class="row">             
          <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center" >
            <form id="frm_status_mantenimiento_oxo" name="frm_status_mantenimiento_oxo" class="form-horizontal" method="POST" role="form">
              <table>
                <tbody>
                  <?php
                    if ($data_controladores != FALSE) {
                        foreach ($data_controladores->result() as $row) {
                            $Id_controlador = $row->id_controlador;
                            $Controlador = $row->nombre_controlador;
                            $Activo = $row->activo;
                     
                    ?>
                  <tr class="id_controlador<?=$Id_controlador;?>" id="<?=$Id_controlador;?>">
                    <td>
                      <label>Estatus del <?=$Controlador?>: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <label class="switch">
                        <?php
                          if ($Activo == 0) {
                            echo '<input class="inpt_mant_cs" data-id="'.$Id_controlador.'" type="checkbox">';    
                          }else{
                            echo '<input class="inpt_mant_cs" data-id="'.$Id_controlador.'" type="checkbox" checked >';
                          }
                        ?>
                        <span class="slider"></span>
                      </label>
                    </td>
                  </tr>
                  <?php
                  }
                    }
                    ?>
                </tbody>
              </table>
            </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
            <form id="frm_new_version" name="frm_new_version" class="form-horizontal" method="POST" role="form">
              <div class="form-group" style="display: inline-block;">
                <label for="nueva_version">Nueva version</label>
                <input type="text" class="form-control" required name="nueva_version" id="nueva_version">
              </div>
              <div class="form-group" style="display: inline-flex;">
                <button type="submit" class="btn btn-outline-primary">></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
