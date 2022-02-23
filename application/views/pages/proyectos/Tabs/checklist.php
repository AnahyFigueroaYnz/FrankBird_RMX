<div class="card shadow-lg tarjeta">
    <div class="step-title">
        <div class="steps" id="StepsContainer">
            <div class="steps-progress"></div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item step">
                    <a class="btn btn-circle step-sourcing btn-step btn-active" id="pills-suorcing-tab" data-toggle="pill" href="#pills-suorcing" role="tab" aria-controls="pills-suorcing" aria-selected="true">1</a>
                </li>
                <li class="nav-item step">
                    <a class="btn btn-circle step-prod btn-step" id="pills-production-tab" data-toggle="pill" href="#pills-production" role="tab" aria-controls="pills-production" aria-selected="false">2</a>
                </li>
                <li class="nav-item step">
                    <a class="btn btn-circle step-freight btn-step" id="pills-freight-tab" data-toggle="pill" href="#pills-freight" role="tab" aria-controls="pills-freight" aria-selected="false">3</a>
                </li>
                <li class="nav-item step">
                    <a class="btn btn-circle step-customs btn-step" id="pills-customs-tab" data-toggle="pill" href="#pills-customs" role="tab" aria-controls="pills-customs" aria-selected="false">4</a>
                </li>
                <!-- <li class="nav-item step">
                    <a class="btn btn-circle btn-step" id="pills-quoted-tab" data-toggle="pill" href="#pills-quoted" role="tab" aria-controls="pills-quoted" aria-selected="false">2</a>
                </li> -->
                <li class="nav-item step">
                    <a class="btn btn-circle step-done btn-step" id="pills-done-tab" data-toggle="pill" href="#pills-done" role="tab" aria-controls="pills-done" aria-selected="false">5</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content tab-content-2" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-suorcing" role="tabpanel" aria-labelledby="pills-suorcing-tab">
            <div class="title-step-card text-center">Sourcing</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/sourcing'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-production" role="tabpanel" aria-labelledby="pills-production-tab">
            <div class="title-step-card text-center">Production</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/production'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-freight" role="tabpanel" aria-labelledby="pills-freight-tab">
            <div class="title-step-card text-center">Freight</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/freight'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-customs" role="tabpanel" aria-labelledby="pills-customs-tab">
            <div class="title-step-card text-center">Cutoms</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/customs'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-quoted" role="tabpanel" aria-labelledby="pills-quoted-tab">
            <div class="title-step-card text-center">Quoted</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/quoted'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-done" role="tabpanel" aria-labelledby="pills-done-tab">
            <div class="title-step-card text-center">Done</div>
            <div class="card card-acord">
                <?php $this->load->view('plataforma/asesor/proyectos/checklist/done'); ?>
            </div>
        </div>
    </div>
</div>