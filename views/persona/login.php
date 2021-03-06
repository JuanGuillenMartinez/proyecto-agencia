<?php 
use yii\bootstrap4\Html;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm; 
?>

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
						<?= $form->field($login, 'username')->textInput(['maxlength' => true])->label("Nombre de usuario")?>
					</div>
					<div class="group">
						<!--<label for="pass" class="label">Contraseña</label> -->
						<?= $form->field($login, 'password')->passwordInput(['maxlength' => true])->label("Contraseña")?>
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
			<div class="sign-up-htm" style="overflow-y: auto; height:320px;">
			<?php $form = ActiveForm::begin(['action' => ["/persona/registrar"], 'options' => ['enctype' => 'multipart/form-data']]); ?>
				<div class="group">
					<?= $form->field($user, 'username')->textInput(['maxlength' => true])->label("Nombre de usuario")?>
				</div>
				<div class="group">
					<?= $form->field($user, 'password')->passwordInput(['maxlength' => true])->label("Contraseña")?>
				</div>
				<div class="group">
					<?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => true])->label("Repetir contraseña")?>
				</div>
				<div class="group">
					<!--<label for="pass" class="label">Correo electrónico</label> -->
					<?= $form->field($user, 'email')->textInput(['maxlength' => true])->label("Correo")?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Nombre</label>-->
					<?= $form->field($persona, 'per_nombre')->textInput(['maxlength' => true])->label("Nombre")?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Apellido paterno</label>-->
					<?= $form->field($persona, 'per_paterno')->textInput(['maxlength' => true])->label("Apellido paterno")?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Apellido materno</label>-->
					<?= $form->field($persona, 'per_materno')->textInput(['maxlength' => true])->label("Apellido materno")?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Fecha de nacimiento</label>-->
					<?/*= $form->field($persona, 'per_nacimiento')->textInput(['maxlength' => true])->label("Fecha de nacimiento")*/?>
					<?= $form->field($persona, 'per_nacimiento')->widget(
                DatePicker::className(),
                [
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
						'autocomplete' => 'off'

                    ]
                ]
            ) ?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Dirección</label>-->
					<?= $form->field($persona, 'per_direccion')->textInput(['maxlength' => true])->label("Dirección")?>
				</div>
                <div class="group">
					<!--<label for="pass" class="label">Teléfono</label>-->
					<?= $form->field($persona, 'per_telefono')->textInput(['maxlength' => true])->label("Teléfono")?>
				</div>
			<div class="hr"></div>
			<div class="group">
				<!--<input type="submit" class="button" value="Registrar">-->
				<?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
			</div>
				<label for="tab-1"><a>¿Ya tienes una cuenta?</a>
			</div>	
			<div class="foot-lnk">
			
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
</div>
