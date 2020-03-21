<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uomo */

$this->title = 'Modifica Uomo';
$this->params['breadcrumbs'][] = ['label' => 'Uomini', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cognome . ' ' .$model->nome ,  'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="uomo-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelAccount' => $modelAccount
    ]) ?>

</div>
