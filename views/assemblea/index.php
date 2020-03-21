<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AssembleaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assemblee';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assemblea-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuova assemblea', ['/assemblea/create'], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'data:date',
            //'tema',
            'tema_ro',
            'tipologia',
            'luogo',
            'n_presenti',
            'n_battezzati',
            'contribuzioni',
            [
                'attribute' => 'Rapporti ricevuti',
                'format' => 'raw',
                'value' => function($model){
                    $html = "<b>" . count($model->rapporti) . "</b>";
                    //if(count($model->rapporti) > 0)
                    //    $html .= Html::a('<i class="fa fa-plus"></i> Vedi rapporti', ['/assemblea/create'], ['class' => 'btn btn-default']);
                    return $html;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
