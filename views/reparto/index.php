<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RepartoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elenco Reparti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-index">

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuovo reparto', ['/reparto/create'], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'nome_ro',
            'stima_n_uomini',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
