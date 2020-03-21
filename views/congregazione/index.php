<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CongregazioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elenco Congregazioni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congregazione-index">

   <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuova Congregazione/Gruppo/Pregruppo', ['/congregazione/create'], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            [
            	'attribute' => 'Tipologia',
            	'format' => 'raw',
            	'value' => function($model){
            		return Yii::$app->params['congregazioniTipologie'][$model->tipologia];
            	},
                'filter' => Html::activeDropDownList($searchModel, 'tipologia', Yii::$app->params['congregazioniTipologie'], ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            'nome',
            'citta',
            'proclamatori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>