<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Assemblea */

$this->title = 'Nuova Assemblea';
$this->params['breadcrumbs'][] = ['label' => 'Assemblee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assemblea-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
