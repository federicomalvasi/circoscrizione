<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Congregazione */

$this->title = 'Modifica: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Congregazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="congregazione-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
