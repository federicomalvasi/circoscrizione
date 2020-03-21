<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Organigramma */

$this->title = 'Nuova assegnazione';
$this->params['breadcrumbs'][] = ['label' => 'Organigramma', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organigramma-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
