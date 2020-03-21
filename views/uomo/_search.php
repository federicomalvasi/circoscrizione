<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\UomoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uomo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'congregazione_id') ?>

    <?= $form->field($model, 'nomina') ?>

    <?php // echo $form->field($model, 'pioniere') ?>

    <?php // echo $form->field($model, 'oratore') ?>

    <?php // echo $form->field($model, 'telefono1') ?>

    <?php // echo $form->field($model, 'telefono2') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'email_jw') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
