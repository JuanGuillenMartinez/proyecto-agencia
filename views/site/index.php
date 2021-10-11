<?php

use yii\bootstrap4\Html;
?>
<!DOCTYPE html>
<html lang="en" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>botonera</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body style="background: #56baed;">
    <section class="border rounded" style="display: inline-block;margin-left: 48px;margin-right: 48px;background: #ffffff;margin-top: 48px;margin-bottom: 48px;border-radius: 80px;border-width: 10px;border-style: none;">
        <div style="margin-top: 24px;">
            <h1 class="text-uppercase" style="text-align: center;padding-bottom: 8px;font-size: 50px;font-family: Poppins, sans-serif;padding-top: 8px;font-weight: bold;">Agencia de viajes</h1>
        </div>
        <div class="row" style="margin-top: 36px;font-family: Roboto, sans-serif;font-size: 14px;">
            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/reservacion">
                    <?php echo Html::img('@web/img/icons/reservacion.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%']) ?>
                </a>
                <h2 style="margin-top: 8px;">Reservación</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/paquete">
                    <?php echo Html::img('@web/img/icons/vuelo.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Paquete</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/cat-seguro">
                    <?php echo Html::img('@web/img/icons/seguro.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Seguro</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/cat-region">
                    <?php echo Html::img('@web/img/icons/region.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Región</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/alojamiento">
                    <?php echo Html::img('@web/img/icons/alojamiento.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                    </a>
                    <h2 style="margin-top: 8px;">Alojamiento</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/cat-aeropuerto">
                <?php echo Html::img('@web/img/icons/aeropuerto.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Aeropuerto</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/cat-pais">
                <?php echo Html::img('@web/img/icons/pais.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">País</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/cat-ubicacion">
                <?php echo Html::img('@web/img/icons/ubicacion.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Ubicación</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <a href="/vuelo">
                <?php echo Html::img('@web/img/icons/vuelo.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                </a>
                <h2 style="margin-top: 8px;">Vuelo</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <?php echo Html::img('@web/img/icons/puesto.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                <h2 style="margin-top: 8px;">Puesto</h2>
            </div>

            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <?php echo Html::img('@web/img/icons/sucursal.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                <h2 style="margin-top: 8px;">Sucursal</h2>
            </div>
            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <?php echo Html::img('@web/img/icons/empleado.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                <h2 style="margin-top: 8px;">Empleado</h2>
            </div>
            <div class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;"></div>
            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <?php echo Html::img('@web/img/icons/factura.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                <h2 style="margin-top: 8px;">Factura</h2>
            </div>
            <div data-bss-hover-animate="pulse" class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;">
                <?php echo Html::img('@web/img/icons/persona.png', ['class' => 'rounded-circle img-fluid', 'width' => '40%', 'data-bss-hover-animate' => 'pulse']) ?>
                <h2 style="margin-top: 8px;">Persona</h2>
            </div>
            <div class="col-md-3" style="text-align: center;padding-top: 8px;padding-bottom: 8px;margin-bottom: 12px;"></div>
        </div>
    </section>
</body>

</html>