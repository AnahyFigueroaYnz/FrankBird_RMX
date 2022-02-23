      </div>
    </div>
  </section>
</div>
<footer class="main-footer"> 
  <?php
    $data_ver =  $this->versiones->get_version();
    $version = $data_ver->version;
  ?>
  <strong><a target="_blank" href="https://reachmx.com/#es">ReachMX&#174;</a></strong>
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> <?= $version ?>
  </div>
</footer>