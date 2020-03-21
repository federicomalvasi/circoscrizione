<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AssembleaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assemblea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tema') ?>

    <?= $form->field($model, 'tema_ro') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'luogo') ?>

    <?php // echo $form->field($model, 'tipologia') ?>

    <?php // echo $form->field($model, 'n_presenti') ?>

    <?php // echo $form->field($model, 'n_battezzati') ?>

    <?php // echo $form->field($model, 'contribuzioni') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
