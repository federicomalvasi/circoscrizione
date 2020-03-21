<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Congregazione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congregazione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipologia')->dropDownList(Yii::$app->params['congregazioniTipologie']) ?>
    
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'proclamatori')->textInput()->label("Numero proclamatori") ?>

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
