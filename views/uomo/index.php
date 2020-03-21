<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Congregazione;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UomoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elenco Uomini';
$this->params['breadcrumbs'][] = $this->title;

$congregazioniList = ArrayHelper::map(Congregazione::find()->all(),'id','nome');
?>
<div class="uomo-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuovo', ['/uomo/create'], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cognome',
            'nome',
            [
	            'attribute' => 'Congregazione',
	            		'format' => 'raw',
	            		'value' => function($model){
	            		return $model->congregazione->nome;
	            },
	            'filter' => Html::activeDropDownList($searchModel, 'congregazione_id', $congregazioniList, ['class'=>'form-control','prompt' => 'Tutte']),
            ],
            [
                'attribute' => 'Nomina',
                'format' => 'raw',
                'value' => function($model){
                    return Yii::$app->params['nomine'][$model->nomina];
                },
                'filter' => Html::activeDropDownList($searchModel, 'nomina', Yii::$app->params['nomine'], ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            [
                'attribute' => 'Oratore',
                'format' => 'raw',
            	'contentOptions' => ['class' => 'text-center'],
            	'value' => function($model){
                    if($model->oratore)
                    	return '<span class="label label-success">Si</span>';
                    else
                    	return '<span class="label label-danger">No</span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'oratore', [0 => 'No', 1 => 'Si'], ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            
            
            //'pioniere',
            //'telefono1',
            //'telefono2',
            'email:email',
            [
            'attribute' => 'Account',
            'format' => 'raw',
            'contentOptions' => ['class' => 'text-center'],
            		'value' => function($model){
            				if(!is_null($model->account_id)){
            					return '<span class="label label-success">Si</span>';
            					
            				}
            				else
            					return '<span class="label label-danger">No</span>';
           		},
            
            ],
            //'email_jw:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
