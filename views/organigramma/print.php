<!--Lo stile inline sugli elementi è fondamentale per farlo leggere dal plugin pdf -->
<?php
    $thStyle = 'white-space: nowrap;border-bottom: 0;border-top: 0;background: rgb(43, 155, 171);';
    $tdStyleSorv = 'white-space: nowrap;border-bottom: 0;border-top: 0;background: #82c2d4;';
    $tdStyle = 'white-space: nowrap;border-bottom: 0;border-top: 0;background: #a9d6e3;';
?>
<table class="table table-bordered organigramma" style="color: rgb(29, 68, 80);">
    <thead>
        <tr class="header">
            <th class="text-center" colspan="9" style="background:#1d4450;color:#fff;font-weight:bold;text-transform:uppercase">
                <h3>ORGANIGRAMĂ EU_M_11 A</h3>
            </th>
        </tr>
        <tr class="fw-600">
            <th style="<?=$thStyle?>">SARCINĂ</th>
            <th style="<?=$thStyle?>">NUME</th>
            <th style="<?=$thStyle?>">PRENUME</th>
            <th style="<?=$thStyle?>">B/SA</th>
            <th style="<?=$thStyle?>">CONGREGAȚIE</th>
            <th style="<?=$thStyle?>">EMAIL</th>
            <th style="<?=$thStyle?>">EMAIL JW</th>
            <th style="<?=$thStyle?>">TELEFON</th>
            <th style="<?=$thStyle?>">NĂSCUT ÎN</th>
        </tr>
    </thead>

    <tbody>
        <tr class="sorv">
            <td style="<?=$tdStyleSorv?>font-weight:bold;">SUPRAVEGHETORUL CIRCUMSCRIPȚIEI</td>
            <td style="<?=$tdStyleSorv?>"><?= $co_uomo->nome ?></td>
            <td style="<?=$tdStyleSorv?>font-weight:bold;"><?= $co_uomo->cognome ?></td>
            <td style="<?=$tdStyleSorv?>">CO</td>
            <td style="<?=$tdStyleSorv?>">EU_M_11</td>
            <td style="<?=$tdStyleSorv?>"><?= $co_uomo->email ?></td>
            <td style="<?=$tdStyleSorv?>"><?= $co_uomo->email_jw ?></td>
            <td style="<?=$tdStyleSorv?>"><?= $co_uomo->telefono1 ?></td>
            <td style="<?=$tdStyleSorv?>"><?= $co_uomo->anno_nascita ?></td>
        </tr>
        <tr>
            <td style="<?=$tdStyle?>font-weight:bold;">SUPRAVEGHETORUL CONGRESULUI</td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->nome ?></td>
            <td style="<?=$tdStyle?>font-weight:bold;"><?= $sa_uomo->cognome ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->nomina ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->congregazione->nome ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->email ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->email_jw ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->telefono1 ?></td>
            <td style="<?=$tdStyle?>"><?= $sa_uomo->anno_nascita ?></td>
        </tr>
        <tr>
            <td style="<?=$tdStyle?>font-weight:bold;">ASIST. SUPR. CONGRESULUI</td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->nome ?></td>
            <td style="<?=$tdStyle?>font-weight:bold;"><?= $asa_uomo->cognome ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->nomina ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->congregazione->nome ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->email ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->email_jw ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->telefono1 ?></td>
            <td style="<?=$tdStyle?>"><?= $asa_uomo->anno_nascita ?></td>
        </tr>

        <?php
            $tdWhite = 'white-space: nowrap;border:0;border-color:white;background: white;color:white;';
        ?>
        <tr style="border: 0px">
            <td colspan="9" style="<?=$tdWhite?>">vuoto</td>
        </tr>

        <?php $prev_reparto = ""; ?>
        <?php foreach($organigramma as $row): ?>
            <?php if($row->reparto->nome_ro != $prev_reparto): ?>
                <tr class="header-section">
                    <td colspan="10" style="background:#1d4450;color:#fff;font-weight:bold;text-transform:uppercase;padding:5px 10px;font-size: 15px">
                        <?= $row->reparto->nome_ro ?>
                    </td>
                </tr>
            <?php endif ?>
            <?php
                $tdStyle = 'white-space: nowrap;border-bottom: 0;border-top: 0;';
                $tdStyle .= ($row->ruolo == 'S') ? 'background: #82c2d4;' : 'background: #a9d6e3;';
            ?>
            <tr>
                <td style="<?=$tdStyle?>font-weight:bold;text-transform: uppercase;"><?= Yii::$app->params['ruoliOrganigrammaRO'][$row->ruolo] ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->nome ?></td>
                <td style="<?=$tdStyle?>font-weight:bold;"><?= $row->uomo->cognome ?></td>
                <td style="<?=$tdStyle?>"><?= Yii::$app->params['nomineRO'][$row->uomo->nomina] ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->congregazione->nome ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->email ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->email_jw ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->telefono1 ?></td>
                <td style="<?=$tdStyle?>"><?= $row->uomo->anno_nascita ?></td>
            </tr>
            <?php $prev_reparto = $row->reparto->nome_ro; ?>
        <?php endforeach; ?>
    </tbody>
</table>

