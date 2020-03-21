<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notifica */

$this->title = 'Invia Nuova Comunicazione';
$this->params['breadcrumbs'][] = ['label' => 'Comunicazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifica-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
