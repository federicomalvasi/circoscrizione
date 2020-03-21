<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reparto */

$this->title = 'Nuovo Reparto';
$this->params['breadcrumbs'][] = ['label' => 'Reparti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
