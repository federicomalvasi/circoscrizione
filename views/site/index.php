<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Benvenuto!</h1>
        <p class="lead">tool per la circoscrizione</p>
    </div>

    <div class="body-content">

        <div class="row">
        <?php if(Yii::$app->user->identity->can('area_assemblee')): ?>
            <div class="col-lg-6">
                <h2><i class="fa fa-sitemap"></i> Assemblee di Circoscrizione</h2>
				<br>
				<p><h4>Cosa puoi fare?</h4></p>
                <p><h4> <a href="<?= Url::to(['organigramma/index']) ?>"> &raquo; Vedi e scarica l'organigramma dei reparti</a></h4>
				<p><h4> <a href="<?= Url::to(['organigramma/miei-reparti']) ?>"> &raquo; Consulta file e modui relativi al tuo reparto</a></h4></p>
				<p><h4> <a href="<?= Url::to(['rapporto/miei-rapporti']) ?>"> &raquo; Invia rapporto finale</a></h4></p>
				
                <p></p>
            </div>
            <?php endif; ?>
            <?php if(Yii::$app->user->identity->can('area_oratori')): ?>
            <div class="col-lg-6">
                <h2><i class="fa fa-black-tie"></i> Oratori</h2>
				<br>
				<p><h4>Cosa puoi fare?</h4></p>
                <p><h4> <a href="<?= Url::to(['oratore/index']) ?>"> &raquo; Vedi elenco degli oratori della circoscrizione</a></h4>
                <p><h4> <a href="<?= Url::to(['schema/circoscrizione']) ?>"> &raquo; Statistiche schemi circoscrizione</a></h4>
				<p><h4> <a href="<?= Url::to(['oratore-schema/']) ?>"> &raquo; Inserisci i tuoi schemi</a></h4></p>
				
                <p></p>	
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>
