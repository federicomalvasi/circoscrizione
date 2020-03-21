<?php
use yii\helpers\Html;

$this->title = 'Modulistica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organigramma">

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $generale->nome ?></h3>
        <div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    
    <?php if(!empty($generale->note)): ?>
    <?= $generale->note ?>
    <br>
    <hr>
    <?php endif; ?>
    <h4 class="text-light-blue">Moduli e file</h4>
    <table class="table">
    <?php 
		foreach ($generale->files as $file): ?>
    		<tr>
    			<td><?= Html::a('<i class="fa fa-cloud-download"></i>', $file->url, ['class'=> 'btn btn-primary']) ?> <?= Html::a($file->name, $file->url, ['class'=> '']) ?></td>
    		</tr>
		<?php endforeach; ?>
    </table>
    
	</div>
</div>


<?php
foreach($modelUomo->organigramma as $assegnazione):
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $assegnazione->reparto->nome ?></h3>
        <div class="box-tools pull-right">
        	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    
    <?php if(!empty($assegnazione->reparto->note)): ?>
    <?= $assegnazione->reparto->note ?>
    <br>
    <hr>
    <?php endif; ?>
    <h4 class="text-light-blue">Moduli e file</h4>
    <table class="table">
    <?php 
		foreach ($assegnazione->reparto->files as $file): ?>
    		<tr>
    			<td><?= Html::a('<i class="fa fa-cloud-download"></i>', $file->url, ['class'=> 'btn btn-primary']) ?> <?= Html::a($file->name, $file->url, ['class'=> '']) ?></td>
    		</tr>
		<?php endforeach; ?>
    </table>
    
	</div>
</div>

<?php endforeach; ?>

</div>