<?php use yii\bootstrap4\ActiveForm; ?>
<div class="body-login">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrar</label>
		<div class="login-form overflow-hidden">
			<div class="sign-in-htm">
				<?php $form = ActiveForm::begin(['action' => ["/user-management/auth/login"], 'options' => ['enctype' => 'multipart/form-data']]); ?>
					<div class="group">
						<!--<label for="user" class="label">Nombre de usuario</label> -->
						<?= $form->field($user, 'username')->textInput(['maxlength' => true])->label("Nombre de usuario")?>
					</div>
					<div class="group">
						<!--<label for="pass" class="label">Contraseña</label> -->
						<?= $form->field($user, 'password_hash')->textInput(['maxlength' => true])->label("Contraseña")?>
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked> 
						<label for="check"><span class="icon-login"></span>Recordarme</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Entrar">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">¿Olvidaste tu contraseña?</a>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
			<div class="sign-up-htm">
			<?php $form = ActiveForm::begin(['action' => ["/persona/registrar"], 'options' => ['enctype' => 'multipart/form-data']]); ?>
				<div class="group">
					<?= $form->field($user, 'username')->textInput(['maxlength' => true])->label("Nombre de usuario")?>
				</div>
				<div class="group">
					<?= $form->field($user, 'password_hash')->textInput(['maxlength' => true])->label("Contraseña")?>
				</div>
				<div class="group">
					<?= $form->field($user, 'confirmation_token')->textInput(['maxlength' => true])->label("Repetir contraseña")?>
				</div>
				<div class="group">
					<label for="pass" class="label">Correo electrónico</label>
					<?/*= $form->field($user, 'email')->textInput(['maxlength' => true]) */?>
				</div>
                <div class="group">
					<label for="pass" class="label">Nombre</label>
					<?/*= $form->field($persona, 'per_nombre')->textInput(['maxlength' => true]) */?>
				</div>
                <div class="group">
					<label for="pass" class="label">Apellido paterno</label>
					<?/*= $form->field($persona, 'per_paterno')->textInput(['maxlength' => true])*/ ?>
				</div>
                <div class="group">
					<label for="pass" class="label">Apellido materno</label>
					<?/*= $form->field($persona, 'per_materno')->textInput(['maxlength' => true]) */?>
				</div>
                <div class="group">
					<label for="pass" class="label">Fecha de nacimiento</label>
					<?/*= $form->field($persona, 'per_nacimiento')->textInput(['maxlength' => true]) */?>
				</div>
                <div class="group">
					<label for="pass" class="label">Dirección</label>
					<?/*= $form->field($persona, 'per_direccion')->textInput(['maxlength' => true]) */?>
				</div>
                <div class="group">
					<label for="pass" class="label">Teléfono</label>
					<?/*= $form->field($persona, 'per_telefono')->textInput(['maxlength' => true]) */?>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Registrar">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">¿Ya tienes una cuenta?</a>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
</div>
