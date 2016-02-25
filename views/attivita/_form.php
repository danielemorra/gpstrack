<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attivita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ats_data')->textInput() ?>
    
    <?php
    echo $form->field($model, 'ats_mezzo_trasporto_id')
		     ->dropDownList($modelMezzoTrasporto, ['prompt'=>'-Seleziona la bici-']);	/*dm9-160223*/
    ?>

    <?= $form->field($model, 'ats_percorso')->textInput(['maxlength' => 100]) ?>
    
    <?= $form->field($model, 'ats_tempo')->textInput() ?>

    <?= $form->field($model, 'ats_distanza_km')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'ats_dislivello')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
