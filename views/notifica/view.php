<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notifica */

$this->title = $model->oggetto;
$this->params['breadcrumbs'][] = ['label' => 'Comunicazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifica-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Mittente',
                'value' => $model->mittente->cognome . ' ' . $model->mittente->nome,
            ],
            'data:datetime',
            'messaggio:raw',
        ],
    ]) ?>
    
    <?php /* if($model->mittente_id == Yii::$app->user->identity->uomo->id || Yii::$user->identity->isAdmin): ?>
    
    
    <?php  foreach($model->destinatari as $destinatario):?>
    <tr>
    	<td><?= $destinatario->fullName() ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; */ ?>

</div>
