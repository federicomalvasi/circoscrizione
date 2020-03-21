<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Uomo;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Circoscrizione */
/* @var $form yii\widgets\ActiveForm */

$uominiList = ArrayHelper::map(Uomo::find()->all(),'id','fullName');

?>

<div class="circoscrizione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'co_uomo_id')->widget(Select2::classname(), [
    		'data' => $uominiList,
    		'options' => ['placeholder' => 'Seleziona un fratello ...'],
    		'pluginOptions' => [
        		'allowClear' => true
    			],
	])->label('Sorvegliante di circoscrizione');
    ?>

    <?= $form->field($model, 'sa_uomo_id')->widget(Select2::classname(), [
    		'data' => $uominiList,
    		'options' => ['placeholder' => 'Seleziona un fratello ...'],
    		'pluginOptions' => [
        		'allowClear' => true
    			],
	])->label('Sorvegliante assemblea');
    ?>
    
    <?= $form->field($model, 'asa_uomo_id')->widget(Select2::classname(), [
    		'data' => $uominiList,
    		'options' => ['placeholder' => 'Seleziona un fratello ...'],
    		'pluginOptions' => [
        		'allowClear' => true
    			],
	])->label('Assistente dell\'assemblea');
    ?>
    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
