<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Assemblea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assemblea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tema_ro')->textInput(['maxlength' => true])->label('Tema romeno') ?>
    
    <?php //$form->field($model, 'tema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
]);?>
    
    <?= $form->field($model, 'tipologia')->dropDownList(Yii::$app->params['tipologieAssemblee']) ?>

    <?= $form->field($model, 'luogo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n_presenti')->textInput() ?>

    <?= $form->field($model, 'n_battezzati')->textInput() ?>

    <?= $form->field($model, 'contribuzioni')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
