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
            
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            [
                'attribute' => 'Moduli/File',
                'format' => 'raw',
                'value' => function($model){
                    $html = "";
                    foreach($model->files as $file){
                        $html .= Html::a('<i class="fa fa-cloud-download"></i> ' . $file->name, $file->url, ['class'=> '']) . '<br>';
                    }
                    $html .= Html::a('<i class="fa fa-paperclip"></i> Aggiungi/Elimina file', ['upload', 'id' => $model->id, 'returnTo' => 'index-modulistica'], ['class' => 'btn btn-primary']);
                    return $html;
                },
                
            ],

        ],
    ]); ?>
</div>
</div>
</div>
