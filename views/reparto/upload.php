<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reparto */

$this->title = 'Gestione file: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Reparti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Allegati';
?>

<div class="reparto-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nome')->hiddenInput()->label(false) ?>
	
	<?= \nemmo\attachments\components\AttachmentsInput::widget([
	'id' => 'file-input', // Optional
	'model' => $model,
	'options' => [ // Options of the Kartik's FileInput widget
		'multiple' => true, // If you want to allow multiple upload, default to false
	],
	'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
		'maxFileCount' => 10, // Client max files
        //'maxFileSize' => 25600
	]
	]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Carica file', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
