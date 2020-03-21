<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assemblea */

$this->title = 'Modifica Assemblea';
$this->params['breadcrumbs'][] = ['label' => 'Assemblea', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tema_ro, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="assemblea-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
