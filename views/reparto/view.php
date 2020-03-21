<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reparto */

$this->title = $model->nome . ' / ' . $model->nome_ro;
$this->params['breadcrumbs'][] = ['label' => 'Reparti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-view">


    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            
	        <?= Html::a('Modifica', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a('Elimina', ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => 'Sei sicuro di voler eliminare questo elemento?',
	                'method' => 'post',
	            ],
	        ]) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nome',
            'nome_ro',
            'stima_n_uomini',
        ],
    ]) ?>

</div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Moduli e file</h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-paperclip"></i> Aggiungi/Elimina file', ['upload', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

    <table class="table table-striped">
    	<?php 
		foreach ($model->files as $file): ?>
    		<tr>
    			<td><?= Html::a('<i class="fa fa-cloud-download"></i>', $file->url, ['class'=> 'btn btn-primary']) ?> <?= Html::a($file->name, $file->url, ['class'=> '']) ?></td>
    			
    		</tr>
    		
		<?php endforeach; ?>
    </table>


</div>
</div>

</div>