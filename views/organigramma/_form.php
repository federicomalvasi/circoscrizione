<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Reparto;
use app\models\Uomo;

/* @var $this yii\web\View */
/* @var $model app\models\Organigramma */
/* @var $form yii\widgets\ActiveForm */

$repartiList = ArrayHelper::map(Reparto::find()->where(['is_hide' => 0])->all(),'id','nome');
$uominiList = ArrayHelper::map(Uomo::find()->all(),'id','denominazione');

?>

<div class="organigramma-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'reparto_id')->dropDownList($repartiList)->label('Reparto') ?>
    
    <?= $form->field($model, 'uomo_id')->widget(Select2::classname(), [
    		'data' => $uominiList,
    		'options' => ['placeholder' => 'Seleziona un fratello ...'],
    		'pluginOptions' => [
        		'allowClear' => true
    			],
	])->label('Fratello');
    ?>
	
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'ruolo')->dropDownList(Yii::$app->params['ruoliOrganigramma'])->label('Incarico svolto') ?>
		</div>
	</div>
	
    

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
