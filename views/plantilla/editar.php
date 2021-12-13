<?php use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\date\DatePicker; 

?>



<body class = "bodyProfile">
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">

							<?php $form = ActiveForm::begin(['action' => ["/persona/image"], 'options' => ['enctype' => 'multipart/form-data']]); ?>

								<?= $form->field($persona, 'img')->widget(
										FileInput::classname(),
										[
											'options' => [
											'accept' => 'image/*',
											],
											'pluginOptions' => [
												'showPreview'    => true,
												'showRemove'     => false,
												'showUpload'     => false,
												'browseClass'    => 'btn btn-success',
												'allowedFileExtensions' => ["png", "jpg", "jpeg"],
												'initialPreview' => [
													Url::home(true) . 'img/persona/' . $persona->per_url
												],
												'initialPreviewAsData' => true,
											]
										]
									);
								?>
									
								<div class="form-group">
									<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
								</div>
							<?php ActiveForm::end(); ?>

								<div class="mt-3">
									<h4><?= $persona->per_nombre?></h4>
									<p class="text-secondary mb-1"><?= $usuario->username?></p>
									<p class="text-muted font-size-sm"><?= $persona->per_correo?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nombre completo</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="Nombre" type="text" class="form-control" value= "<?= $persona->getNombreCompleto()?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Correo</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="correo" type="text" class="form-control" value="<?= $persona->per_correo?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Teléfono</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="telefono" type="text" class="form-control" value="<?= $persona->per_telefono?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Dirección</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="direccion" type="text" class="form-control" value="<?= $persona->per_direccion?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Fecha de nacimiento</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									
									<?= DatePicker::widget([
										'name' => 'birth_date',
										'id' => 'nacimiento',
										'value' => $persona->per_nacimiento,
										'pluginOptions' => [
											'autoclose' => true,
											'format' => 'yyyy-mm-dd'
										]
									])?>
																	</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<?= Html:: button("Guardar",["type" => "button", "class" => "btn btn-primary px-4", "onclick" => "actualizarUsuario({$persona->per_id})"]) ?>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="d-flex align-items-center mb-3">Project Status</h5>
									<p>Web Design</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Website Markup</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>One Page</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Mobile Template</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Backend API</p>
									<div class="progress" style="height: 5px">
										<div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
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
