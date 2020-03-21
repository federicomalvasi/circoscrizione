<?php 

use app\models\Congregazione;
use app\models\Oratore;

$congregazioni = Congregazione::find()->orderby('nome')->all();
?>
<table>
<?php foreach($congregazioni as $congregazione): ?>

<?php
$oratori = Oratore::find()->with('schemi')->where(['congregazione_id' => $congregazione->id])->orderby('cognome,nome')->all();
?>
	<tr>
		<th colspan="4"><?= Yii::$app->params['congregazioniTipologie'][$congregazione->tipologia] ?>: <?= $congregazione->nome ?></th>
	</tr>
	<tr>
		<th>Oratore</th>
		<th>Nomina</th>
		<th>Telefono</th>
		<th>Email</th>
		<th>Schemi</th>
	</tr>
<?php 
if(!is_null($oratori)):
foreach($oratori as $oratore): ?>
<tr>
	<td><?= $oratore->cognome . ' ' . $oratore->nome ?></td>
	<td><?= $oratore->nomina ?></td>
	<td><?= $oratore->telefono1 ?></td>
	<td><?= $oratore->email ?></td>
	<td>
		<?php 
		$schemi_string = "";
		foreach($oratore->schemi as $schema){
			$schemi_string .= $schema->numero . ', ';
		}
		?>
			
		<?= substr($schemi_string, 0, -2); ?>
	</td>
</tr>

<?php endforeach; ?>
<?php endif; ?>
<?php endforeach; ?>
</table>