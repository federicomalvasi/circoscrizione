<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rapporto */

$this->title = 'Invia Rapporto finale Assemblea';
//$this->params['breadcrumbs'][] = ['label' => 'Rapporti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rapporto-create">

    <?= $this->render('_form', [
        'model' => $model,
        'reparti_list' => $reparti_list
    ]) ?>

</div>
