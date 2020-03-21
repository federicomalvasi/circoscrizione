<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Uomo;

/* @var $this yii\web\View */
/* @var $model app\models\Notifica */
/* @var $form yii\widgets\ActiveForm */

$uominiList = ArrayHelper::map(Uomo::find()->where(['IS NOT', 'account_id', null])->all(),'id','denominazione');
?>

<div class="notifica-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'destinatari')->widget(Select2::classname(), [
    		'data' => $uominiList,
    		'options' => ['placeholder' => 'Seleziona uno o più destinatari ...', 'multiple' => true],
    		'pluginOptions' => [
        		'allowClear' => true
    			],
	])->label('Destinatari');
    ?>
	
    <?= $form->field($model, 'oggetto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'messaggio')->widget(TinyMce::className(), [
    'options' => ['rows' => 8],
    'language' => 'it',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>

    <div class="form-group">
        <?= Html::submitButton('Salva ed Invia', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
