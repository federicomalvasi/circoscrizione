<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Reparto;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrganigrammaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organigramma';
$this->params['breadcrumbs'][] = $this->title;

$repartiList = ArrayHelper::map(Reparto::find()->orderBy('nome ASC')->all(),'id','nome');
?>
<div class="organigramma-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
        	<?php if(Yii::$app->user->identity->isAdmin): ?>
            	<?= Html::a('<i class="fa fa-plus"></i> Nuova assegnazione', ['/organigramma/create'], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>	
            <?= Html::a('<i class="fa fa-print"></i> Stampa elenco', ['print'], ['class' => 'btn btn-primary']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
            	'attribute' => 'Reparto',
            	'format' => 'raw',
            	'value' => function($model){
            		return $model->reparto->nome;
            	},
            	'filter' => Html::activeDropDownList($searchModel, 'reparto_id', $repartiList, ['class'=>'form-control','prompt' => 'Tutti']),
            	'group' => true,
            ],
            [
	            'attribute' => 'Incarico',
	            'format' => 'raw',
	            'value' => function($model){
	            	return Yii::$app->params['ruoliOrganigramma'][$model->ruolo];
	            },
	            'filter' => Html::activeDropDownList($searchModel, 'ruolo', Yii::$app->params['ruoliOrganigramma'], ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            [
	            'attribute' => 'Fratello',
	            'format' => 'raw',
	            'value' => function($model){
	            	return $model->uomo->cognome . ' ' . $model->uomo->nome;
	            },
	            
            ],
            [
            	'attribute' => 'Contatti',
            	'format' => 'raw',
            	'value' => function($model){
            		return  $model->uomo->telefono1 . '<br>' . $model->uomo->email;
           	 	},
            ],
            //'uomo_id',
            //'reparto_id',
            

            [
            	'class' => 'yii\grid\ActionColumn',
            	'template' => '{delete}',		
            	'visible' => Yii::$app->user->identity->isAdmin	
	        ],
        ],
    ]); ?>
</div>
</div>
</div>