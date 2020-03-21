<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Congregazione */

$this->title = 'Nuova Congregazione/Gruppo/Pregruppo';
$this->params['breadcrumbs'][] = ['label' => 'Congregazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congregazione-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
