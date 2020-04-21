<?php

use app\models\Congregazione;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uomo */
/* @var $form yii\widgets\ActiveForm */

$congregazioniList = ArrayHelper::map(Congregazione::find()->all(),'id','nome');
?>

<div class="uomo-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'cognome')->textInput() ?>	
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'nome')->textInput() ?>
		</div>
    </div>
    
    <div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'congregazione_id')->dropDownList($congregazioniList)->label('Congregazione/Gruppo/Pregruppo') ?>
		</div>
		<div class="col-md-2">
			<?= $form->field($model, 'nomina')->dropDownList(['A' => 'Anziano', 'SM' => 'Servitore di Ministero']) ?>
		</div>
		<div class="col-md-2">
			<br>
			<?= $form->field($model, 'pioniere')->checkbox() ?>
		</div>
		<div class="col-md-2">
			<br>
			<?= $form->field($model, 'oratore')->checkbox() ?>
		</div>
	</div>
	<div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'telefono1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'telefono2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'anno_nascita')->textInput(['maxlength' => true]) ?>
        </div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'email_jw')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
	<?php if($model->isNewRecord): ?>
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'has_account')->checkbox(['id'=> 'has-account']) ?>
		</div>
	</div>
    <?php endif; ?>
    <hr>
    <div id="account-block" style="<?= (!$model->isNewRecord && !is_null($modelAccount)) ? '' : 'display: none;'  ?>">
    <?php //if($model->isNewRecord): ?>
    <div class="row">
		<div class="col-md-6">
			<?= $form->field($modelAccount, 'username')->textInput(['maxlength' => true, 'id' => 'username']) ?>
		</div>
		<div class="col-md-6">
			<?= $form->field($modelAccount, 'ruolo')->dropDownList(['U' => 'Utente classico', 'A' => 'Amministratore']) ?>
		</div>
		<div class="col-md-12">
		<h4>Permessi dell'account</h4>
		<?= $form->field($modelAccount, 'area_assemblee')->checkbox() ?>
		<?= $form->field($modelAccount, 'area_oratori')->checkbox() ?>
		</div>
	</div>
    <?php //endif; ?>
    </div>
	<div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
<?php 
$this->registerJs("
    $('#has-account').on('change', function() { 
        if($(this).is(':checked')){
            $('#account-block').show();
            usernameFill();
        }
        else
            $('#account-block').hide();
    });
    
    function usernameFill(){
        var username = $('#uomo-nome').val().slice(0,1) + $('#uomo-cognome').val();   
        $('#username').val(username);
    }

");
?>
