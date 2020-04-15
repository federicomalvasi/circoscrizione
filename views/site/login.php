<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use cinghie\cookieconsent\widgets\CookieWidget;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$privacyUrl = Url::to(['site/privacy']);
?>

    <script>
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#252e39"
                },
                "button": {
                    "background": "#14a7d0"
                }
            },
            "theme": "classic",
            "type": "opt-out"
        });
    </script>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Circuit </b>EU Romanian 11</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-12">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
		<br>
        <a href="<?= Url::to(['/site/request-password-reset']) ?>">Ho dimenticato la password</a><br>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

<?= CookieWidget::widget([
    'message' => 'ATTENZIONE! Questo sito utilizza i cookie per consentirti la navigazione. Chiudendo questo banner, scorrendo questa pagina, cliccando su un link o proseguendo la navigazione in altra maniera, acconsenti all’uso dei cookie e accetti implicitamente quanto indicato sull&apos;',
    'dismiss' => 'Accetto',
    'learnMore' => 'Informativa privacy e cookie',
    'link' => $privacyUrl,
    'theme' => 'dark-bottom',
    'expiryDays' => '15'
]); ?>