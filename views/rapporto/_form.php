<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rapporto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rapporto-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'assemblea_id')->hiddenInput()->label(false) ?>
    
    <?= "Assemblea: " . "<b>" . Yii::$app->formatter->asDate($model->assemblea->data) . "</b> - " . $model->assemblea->tema_ro;?>

    <?= $form->field($model, 'reparto_id')->dropDownList($reparti_list)->label('Reparto') ?>
	
    <?= \nemmo\attachments\components\AttachmentsInput::widget([
	'id' => 'file-input', // Optional
	'model' => $model,
	'options' => [ // Options of the Kartik's FileInput widget
		'multiple' => true, // If you want to allow multiple upload, default to false
	],
	'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
		'maxFileCount' => 5 // Client max files
	]
	]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salva e Invia', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
