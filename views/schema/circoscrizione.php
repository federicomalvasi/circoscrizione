<?php

use miloschuman\highcharts\Highcharts;


/* @var $this yii\web\View */


$this->title = 'Statistiche';
$this->params['breadcrumbs'][] = 'Statistiche schemi circoscrizione';

$schemiDisp = [];
$schemiPocoRicorr = [];
$schemiRicorr = [];
$schemiMoltoRicorr = [];

foreach ($schemi_circ as $schema) {
    if ($schema['tot'] == 0) {
        array_push($schemiDisp, ["Schema n. ".$schema['numero'], 1]);
    }elseif ($schema['tot'] >= 1 && $schema['tot'] <= 2) {
        array_push($schemiPocoRicorr, ["Schema n. ".$schema['numero'], 2]);
    }elseif ($schema['tot'] >= 3 && $schema['tot'] <= 4) {
        array_push($schemiRicorr, ["Schema n. ".$schema['numero'], 4]);
    }elseif ($schema['tot'] >= 5) {
        array_push($schemiMoltoRicorr, ["Schema n. ".$schema['numero'], 5]);
    }
}

echo Highcharts::widget([
    'scripts' => [ 'modules/drilldown'],
    'options' => [
        'chart' => [
            'type'=>'column',
            'events' => [
                    'drilldown' => new \yii\web\JsExpression('function (e) {
                        if (!e.seriesOptions) {
                            //alert(e.point.drilldown)
                            var el = document.getElementById(e.point.drilldown);
                            el.scrollIntoView({behavior:"smooth"});
                        }
                    }')
            ]
        ],
        'title' => ['text' => 'Schemi circoscrizione'],
        'accessibility' => [
            'announceNewData' => ['enabled'=>true]
        ],
        'xAxis' => [
            'type' => 'category'
        ],
        'yAxis' => [
            'title' => ['text' => 'Numero schemi ']
        ],
        'legend' => [
            'enabled' => false
        ],
        'plotOptions' => [
            'series' => [
                'borderWidth' => 0,
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '{point.y}'
                ]
            ],
            'column' => [
                'colors' => ['#76b041', '#ffe066', '#f6aa1c', '#e4572e']
            ]
        ],
        'tooltip' => [
                'headerFormat' => '<span style="font-size:11px">{series.name}</span><br>',
                'pointFormat' => '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        ],
        'series' => [
            [
                'name' => 'Schemi',
                'colorByPoint' => true,
                'data' => [
                    [
                        'name' => 'Tot. schemi disponibili',
                        'y' => count($schemiDisp),
                        'drilldown' => 'disponibili'
                    ],
                    [
                        'name' => 'Tot. schemi poco ricorrenti',
                        'y' => count($schemiPocoRicorr),
                        'drilldown' => 'pocoRicorr'
                    ],
                    [
                        'name' => 'Tot. schemi ricorrenti',
                        'y' => count($schemiRicorr),
                        'drilldown' => 'ricorrenti'
                    ],
                    [
                        'name' => 'Tot. schemi molto ricorrenti',
                        'y' => count($schemiMoltoRicorr),
                        'drilldown' => 'moltoRicorr'
                    ]
                ]
            ]
        ],
        'drilldown' => [
            'series' => []
        ]
        /*'drilldown' => [
            'series' => [
                [
                    'name' => 'Tot. schemi disponibili',
                    'id' => 'disponibili',
                    'data' => $schemiDisp
                ],
                [
                    'name' => 'Tot. schemi poco ricorrenti',
                    'id' => 'pocoRicorr',
                    'data' => $schemiPocoRicorr
                ],
                [
                    'name' => 'Tot. schemi ricorrenti',
                    'id' => 'ricorrenti',
                    'data' => $schemiRicorr
                ],
                [
                    'name' => 'Tot. schemi molto ricorrenti',
                    'id' => 'moltoRicorr',
                    'data' => $schemiMoltoRicorr
                ],
            ]
        ]*/
    ]
]);


?>

<table class="table table-striped" style="margin-top: 40px">
    <thead>
    <tr style="background-color: #247ba0;color: white;">
        <th scope="col">Numero</th>
        <th scope="col">Titolo</th>
        <th scope="col">
            N. fratelli <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Numero fratelli della circoscrizione che hanno preparato lo schema"></span>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $style = "";
    $prevStyle = "";
    foreach($schemi_circ as $schema): ?>
        <?php
        $id = "";
        if ($schema['tot'] == 0) {
            $style = 'background-color:#76b041';
            if (strcmp($prevStyle, $style) !== 0) {
                $prevStyle = $style;
                $id = "disponibili";
            }
        }elseif ($schema['tot'] >= 1 && $schema['tot'] <= 2) {
            $style = 'background-color:#ffe066';
            if (strcmp($prevStyle, $style) !== 0) {
                $prevStyle = $style;
                $id = "pocoRicorr";
            }
        }elseif ($schema['tot'] >= 3 && $schema['tot'] <= 4) {
            $style = 'background-color:#f6aa1c';
            if (strcmp($prevStyle, $style) !== 0) {
                $prevStyle = $style;
                $id = "ricorrenti";
            }
        }elseif ($schema['tot'] >= 5) {
            $style = 'background-color:#e4572e';
            if (strcmp($prevStyle, $style) !== 0) {
                $prevStyle = $style;
                $id = "moltoRicorr";
            }
        }
        ?>
        <tr id="<?=$id?>" style="<?=$style?>">
            <th scope="row"><?= $schema['numero']?></th>
            <td><?= $schema['titolo']?></td>
            <td><?= $schema['tot']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php

$js = <<<SCRIPT
/* To initialize BS3 tooltips set this below */
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});
SCRIPT;
$this->registerJs($js);


?>