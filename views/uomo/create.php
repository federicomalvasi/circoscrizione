<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Uomo */

$this->title = 'Nuovo Uomo';
$this->params['breadcrumbs'][] = ['label' => 'Uomini', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uomo-create">

    <?= $this->render('_form', [
        'model' => $model,
    	'modelAccount' => $modelAccount
    ]) ?>

</div>
