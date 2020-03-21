<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\NotificheWidget\NotificheWidget;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">EU11</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown notifications-menu" id="notifiche-list">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning" id="notifiche-number-badge"></span>
                    </a>
                    <?= NotificheWidget::widget() ?>
                </li>
           
                <!-- User Account: style can be found in dropdown.less -->

                <li class="user user-menu">
                	<a href="#">
                		<i class="fa fa-user-o"></i> Ciao, 
                    	<span class="hidden-xs"><?= Yii::$app->user->identity->uomo->nome ?>!</span>
                    </a>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="<?= Url::to(['site/logout']) ?>" data-method="POST">
                    	<i class="fa fa-sign-out"></i>
                    	Esci
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
