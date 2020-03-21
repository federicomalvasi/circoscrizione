<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OratoreSchema */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schemi di: ' . $modelOratore->nome . ' ' . $modelOratore->cognome ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oratore-schema-index">

<div class="row">
	<div class="col-md-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Schemi attuali</span>
              <span class="info-box-number">
              
              <?php foreach($modelOratore->schemi as $schema): ?>
    	
            		<?= $schema->numero . '&nbsp;&nbsp;&nbsp;&nbsp;'?>	

    <?php endforeach; ?>
              
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">
        Aggiungi/Elimina schemi
        </h3>
        <div class="box-tools pull-right">
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model) use($schemi_assegnati, $modelOratore){
        	if(in_array($model->id,$schemi_assegnati)){
        		return ['class' => 'info'];
        	}
        },
        'columns' => [
            'numero',
            'titolo',
            'titolo_ro',
            [
            	'class' => 'yii\grid\ActionColumn',
            	'template' => '{action}',
            	'buttons' => [
            		// add/delete button
                    'action' => function ($url, $model) use ($schemi_assegnati, $modelOratore) {
                        if(!in_array($model->id,$schemi_assegnati))
            				return Html::a('<i class="fa fa-plus"></i>', Url::to(['oratore-schema/add', 'oratore_id' => $modelOratore->id, 'schema_id' => $model->id]), ['class' => 'btn btn-success']);
                    	else 
                    		return Html::a('<i class="fa fa-times"></i>', Url::to(['oratore-schema/delete', 'oratore_id' => $modelOratore->id, 'schema_id' => $model->id]), ['class' => 'btn btn-danger', 'data-method' => 'POST']);
            		},
                    
            	]
            
            ],
        ],
    ]); ?>
</div>
</div>
</div>
