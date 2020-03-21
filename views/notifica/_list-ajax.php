<?php
use yii\helpers\Url;
?>
<ul class="dropdown-menu">
<li class="header"><b>Hai <?= count($notifiche) ?> <?= (count($notifiche) == 1) ? 'nuova comunicazione' : 'nuove comunicazioni' ?></b></li>
<li>
<ul class="menu">
<?php foreach($notifiche as $notifica):  ?>
<li>
<a href="<?= Url::to(['notifica/view', 'id' => $notifica->notifica_id])?>">
<i class="fa fa-circle-o text-orange"></i> <?= $notifica->notifica->oggetto ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</li>
<li class="footer"><a href="#">Viasualizza tutte</a></li>
</ul>