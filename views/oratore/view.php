<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oratore */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oratores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oratore-view">

    <h3><?= $model->nome . ' ' . $model->cognome ?></h3>
    <h4><?= $model->congregazione->nome ?></h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nomina',
            'pioniere',
            'oratore',
            'telefono1',
            'telefono2',
            'email:email',
            'email_jw:email',
        ],
    ]) ?>
    
</div>

<div>

	<h4>Schemi</h4>
    <table class="table">
    <?php foreach($model->schemi as $schema): ?>
    	<tr>
    		<td><?= $schema->numero ?></td>
	    	<td>
	    		<?= $schema->titolo ?><br>
	    		<?= $schema->titolo_ro ?>
	    	</td>
    	</tr>
    <?php endforeach; ?>
	</table>

</div>
