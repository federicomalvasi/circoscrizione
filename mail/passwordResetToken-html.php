<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Ciao <?= Html::encode($user->uomo->nome) ?>,</p>
	
	Ecco la tua username: <b><?= Html::encode($user->username) ?></b>
    <p>Fai click sul seguente link per impostare una nuova password e accedere all'applicazione web della circoscrizione EU Romanian 11:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
    
</div>
