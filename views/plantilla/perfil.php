<?php 
use yii\bootstrap4\Html;
use webvimark\modules\UserManagement\models\User; 
?>
<body class = "bodyProfile">
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Usuario</a></li>
              <li class="breadcrumb-item active" aria-current="page">Perfil de usuario</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm" style="height: 1000px">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?= Html::img("@web/img/persona/".$persona->per_url, ['class'=> 'rounded-circle', 'width'=>'150']) ?>
                    <div class="mt-3">
                      <h4><?= $persona->per_nombre?></h4>
                      <p class="text-secondary mb-1"><?= $usuario->username?></p>
                      <p class="text-muted font-size-sm"><?= $persona->per_correo?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $persona->getNombreCompleto()?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $persona->per_correo?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $persona->per_telefono?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Dirección</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $persona->per_direccion?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Fecha de nacimiento</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $persona->per_nacimiento?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="/plantilla/editar">Editar</a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Usuario</i>Reservaciones</h6>
                      <?php 
                        $usuario = User::getCurrentUser();
                        $reservaciones=$persona->getReservacionesPagadas($usuario->id);
                        foreach($reservaciones as $reservacion){ ?>
                          <a href= <?= "/reservacion/detalles/".$reservacion->res_id ?>><small><?="Reservación con fecha de: ".$reservacion->res_creacion?></small></a>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

    <style>
      .card {
        width: auto;
    height: auto;
      }
    </style>

