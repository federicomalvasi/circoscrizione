<h1 style="text-align: center">CIRCUIT EU ROMANIAN 11 - ZONE A</h1>

<table cellpadding="0" cellspacing="0">
	<tr style="">
		<th style="background-color: #3385ff; color: #FFF; padding: 15px; border: 1px solid #000; text-align: center">Departament</th>
		<th style="padding: 15px; border: 1px solid #000; text-align: center">Sarcină</th>
		<th style="padding: 15px; border: 1px solid #000; text-align: center">Nume</th>
		<th style="padding: 15px; border: 1px solid #000; text-align: center">Congregație</th>
		<th style="padding: 15px; border: 1px solid #000; text-align: center">Telefon</th>
		<th style="padding: 15px; border: 1px solid #000; text-align: center">Email</th>
	</tr>
	<?php $prev_reparto = ""; ?>
	<?php foreach($organigramma as $row): ?>
	
	<tr>
		<td style="padding: 15px; font-size: 16px; background-color: #3385ff; color: #FFF; text-transform: uppercase; border: 1px solid #000"><?= ($row->reparto->nome_ro != $prev_reparto) ? $row->reparto->nome_ro : '' ?></td>
		<td style="padding: 5px; text-transform: uppercase; border: 1px solid #000"><?= Yii::$app->params['ruoliOrganigrammaRO'][$row->ruolo] ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $row->uomo->fullName ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $row->uomo->congregazione->nome ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $row->uomo->telefono1 ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $row->uomo->email ?><br><?= $row->uomo->email_jw ?></td>
	</tr>
	<?php $prev_reparto = $row->reparto->nome_ro; ?>
	<?php endforeach; ?>
</table>
<br><br>
<table cellpadding="0" cellspacing="0">
	<tr>
		<td style="background-color: #3385ff; color: #FFF; padding: 15px; border: 1px solid #000; text-align: center">Supraveghetorul Circumscripției</td>
		<td style="padding: 5px; border: 1px solid #000"><?= $co_uomo->nome . ' ' . $co_uomo->cognome ?></td>
		<td style="padding: 5px; border: 1px solid #000"></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $co_uomo->telefono1 ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $co_uomo->email_jw ?></td>
	</tr>
	<tr>
		<td style="background-color: #3385ff; color: #FFF; padding: 15px; border: 1px solid #000; text-align: center">Supraveghetorul congresului</td>
		<td style="padding: 5px; border: 1px solid #000"><?= $sa_uomo->nome . ' ' . $sa_uomo->cognome ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $sa_uomo->congregazione->nome ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $sa_uomo->telefono1 ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $sa_uomo->email ?><br><?= $sa_uomo->email_jw ?></td>
	</tr>
	<tr>
		<td style="background-color: #3385ff; color: #FFF; padding: 15px; border: 1px solid #000; text-align: center">Asistent Supraveghetorului congresului</td>
		<td style="padding: 5px; border: 1px solid #000"><?= $asa_uomo->nome . ' ' . $asa_uomo->cognome ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $asa_uomo->congregazione->nome ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $asa_uomo->telefono1 ?></td>
		<td style="padding: 5px; border: 1px solid #000"><?= $asa_uomo->email ?><br><?= $asa_uomo->email_jw ?></td>
	</tr>
</table>