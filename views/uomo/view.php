<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Uomo */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Elenco uomini', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uomo-view">

    <p>
        <?= Html::a('Modifica', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sei sicuro di voler eliminare questo elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'cognome',
            'nome',
            'congregazione.nome',
            [
                'label' => 'Nomina',
                'value' => Yii::$app->params['nomine'][$model->nomina]
            ],
            [
                'label' => 'Pioniere',
                'value' => Yii::$app->params['boolean'][$model->pioniere]
            ],
            [
                'label' => 'Oratore',
                'value' => Yii::$app->params['boolean'][$model->oratore]
            ],
            'telefono1',
            'telefono2',
            'anno_nascita',
            'email:email',
            'email_jw:email',
        ],
    ]) ?>

</div>
