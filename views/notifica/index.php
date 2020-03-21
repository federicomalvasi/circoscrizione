<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NotificaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comunicazioni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifica-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuova comunicazione', ['/notifica/create'], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'data',
            'oggetto',
            //'messaggio:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
