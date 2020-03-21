<?php

use app\models\Schema;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\Congregazione;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OratoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oratori';
$this->params['breadcrumbs'][] = $this->title;

$congregazioniList = ArrayHelper::map(Congregazione::find()->all(),'id','nome');
$schemiList = ArrayHelper::map(Schema::find()->all(), 'id', 'numero')
?>
<div class="oratore-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Nuovo oratore', ['/uomo/create', 'from' => 'oratore'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Stampa elenco', ['print'], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Congregazione',
                'format' => 'raw',
                'value' => function($model){
                    return $model->congregazione->nome;
                 },
                'filter' => Html::activeDropDownList($searchModel, 'congregazione_id', $congregazioniList, ['class'=>'form-control','prompt' => 'Tutte']),
                'group' => true,
            ],
            'cognome',
            'nome',
            [
                'attribute' => 'Nomina',
                'format' => 'raw',
                'value' => function($model){
                    return Yii::$app->params['nomine'][$model->nomina];
                },
                'filter' => Html::activeDropDownList($searchModel, 'nomina', Yii::$app->params['nomine'], ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            [
                'attribute' => 'Schemi',
                'format' => 'raw',
                'value' => function($model){
                    $html = "";
                    if(count($model->schemi) > 0){
                        foreach($model->schemi as $schema){
                            $html .= '<span class="badge bg-light-blue">' . $schema->numero . '</span> ';
                        }
                    }
                    return $html;
                },
                'filter' => Html::activeDropDownList($searchModel, 'schema_id', $schemiList, ['class'=>'form-control','prompt' => 'Tutti']),
            ],
            //'pioniere',
            //'oratore',
            //'telefono1',
            //'telefono2',
            //'email:email',
            //'email_jw:email',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {edit-schemi}',
                'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fa fa-eye"></i>', '#', ['value' => Url::to(['oratore/view-quick', 'id' => $model->id]), 'title' => 'Dettaglio oratore', 'class' => 'showModalButton']);
                    },
                    'edit-schemi' => function ($url, $model) {
                        if(!Yii::$app->user->identity->isAdmin)
                            return;
                        return Html::a('<i class="fa fa-file-text-o"></i>', Url::to(['/oratore-schema', 'editMode' => true,'oratore_id' => $model->id]));
                    },
                    
                ],
            ],
        ],
    ]); ?>
</div>
</div><!-- /.box-body -->
</div><!-- /.box -->

<?php 
	Modal::begin([
      'header' => '<span id="modalHeaderTitle"></span>',
      'headerOptions' => ['id' => 'modalHeader'],
      'options' => [
		'tabindex' => false // important for Select2 to work properly
      ],
      'id' => 'modal',
      'size' => 'modal-lg',
      		
      //keeps from closing modal with esc key or by clicking out of the modal.
     	//'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
      ]);
      echo "<div id='modalContent'></div>";
     Modal::end();
?>




    