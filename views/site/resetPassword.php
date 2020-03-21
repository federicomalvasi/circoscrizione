<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Circuit </b>EU Romanian 11</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><h1>Inserisci la nuova password</h1></p>



<div class="site-reset-password">
       <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
				
				<?= $form->field($model, 'password_repeat')->passwordInput()->label('Ripeti Password') ?>
				
				
                <div class="form-group">
                    <?= Html::submitButton('Salva', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div></div>