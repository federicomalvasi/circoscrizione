<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invia rapporto finale';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rapporto-index">
<?php if(!is_null($assemblea)): ?>
<div class="alert alert-warning alert-dismissible">
	<h4><i class="icon fa fa-warning"></i> Non hai ancora inviato il rapporto finale del tuo reparto?</h4>
	Caro fratello, se non l'hai ancora fatto, ti invitiamo ad inviare il rapporto finale il prima possibile, facendo click sul seguente link: 
	<br>
	<?= Html::a('<i class="fa fa-paper-plane"></i> Invia rapporto finale', ['/rapporto/create', 'assemblea_id' => $assemblea->id], ['class' => 'btn btn-warning']) ?>
</div>
<?php endif; ?>

  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Rapporti inviati</h3>
        <div class="box-tools pull-right">
            
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'Assemblea',
                'format' => 'raw',
                'value' => function($model){
                    $html = "<b>" . Yii::$app->formatter->asDate($model->assemblea->data) . "</b>";
                    $html .= ' - ' . $model->assemblea->tema_ro;
                    return $html;
                },
            ],
            [
                'attribute' => 'Reparto',
                'format' => 'raw',
                'value' => function($model){
                    return $model->reparto->nome;
                },
             ],
             [
                 'attribute' => 'Inviato il',
                 'format' => 'raw',
                 'value' => function($model){
                    return Yii::$app->formatter->asDate($model->created_at);
                 },
             ],
            //'reparto_id',
            //'created_by',
            //'updated_by',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
