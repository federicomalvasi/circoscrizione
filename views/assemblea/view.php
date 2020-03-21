<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assemblea */

$this->title = $model->tema_ro;
$this->params['breadcrumbs'][] = ['label' => 'Assemblea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assemblea-view">

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
      
            'data',
            'luogo',
            'tipologia',
            'n_presenti',
            'n_battezzati',
            'contribuzioni',
        ],
    ]) ?>

</div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Rapporti ricevuti</h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus"></i> Aggiungi rapporto', ['/rapporto/create', 'assemblea_id' => $model->id], ['class' => 'btn btn-success']) ?>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">

    <table class="table table-striped">
    	<tr>
    		<th>Reparto</th>
    		<th>File</th>
    		<th>Inviato da</th>
    		<th>Inviato il</th>
    	</tr>
    	<?php 
		foreach ($model->rapporti as $rapporto): ?>
    		<tr>
    			<td><?= $rapporto->reparto->nome ?></td>
    			<td>
    			<?php if(count($rapporto->files) > 0): ?>
    			<?php foreach($rapporto->files as $file):?>
    			<?= Html::a('<i class="fa fa-cloud-download"></i> ' . $file->name, $file->url, ['class'=> '']) ?>
    			<?php endforeach; ?>
    			<?php endif; ?>
    			</td>
    			<td><?= $rapporto->created_by ?></td>
    			<td><?= Yii::$app->formatter->asDate($rapporto->created_at) ?></td>
    		</tr>
    		
		<?php endforeach; ?>
    </table>


</div>
</div>




</div>

