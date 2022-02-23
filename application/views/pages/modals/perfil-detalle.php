<?php
    if ($DATA_USUARIO != FALSE) {
        foreach ($DATA_USUARIO->result() as $row) {
            $nombre = $row->nombre;
            $email = $row->email;
            $telefono = $row->telefono;
            $id_lada_usuario = $row->id_lada;
            $img_path = $row->img_path;
        }
    }
?>
<div class="card shadow-lg tarjeta">
    <div class="card-body box-profile" style="padding: 1rem;padding-bottom: 0rem;">
        <div style="padding: 2rem 2rem 2rem 2rem;">
            <?php if ($img_path != null) { ?>
                <img class="ratio img-responsive img-circle" style="background-image: url('<?= base_url($img_path)?>');"> 
            <?php } else { ?>
            <img class="ratio img-responsive img-circle" style="background-image: url('<?= base_url()?>resources/navbar/user.jpg'); ">
            <?php }?>
        </div>
    </div>
    <div class="card-body" style="border-top: #e5e5e5 solid 1px;padding-bottom: 0rem;padding-top: 0.5rem;">
        <strong><i class="fas fa-book mr-1"></i> Contacto</strong>
        <p class="text-muted" style="margin-bottom: 0.1rem;">
            Nombre:&nbsp;&nbsp;<?=$nombre;?>
        </p>
        <p class="text-muted" style="margin-bottom: 0.1rem;">
            Correo:&nbsp;&nbsp;<?=$email;?>
        </p>
        <p class="text-muted" style="margin-bottom: 0.1rem;">
            Telefono:&nbsp;&nbsp;
            <?php
                if ($DATA_LADAS != FALSE) {
                    foreach ($DATA_LADAS->result() as $row) {
                        if ($row->id_lada == $id_lada_usuario) {
                            echo $row->lada .' '. $telefono;; 
                        }                    
                    }
                }
            ?>
        </p>
    </div>
</div>