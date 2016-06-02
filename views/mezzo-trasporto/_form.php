<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MezzoTrasporto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mezzo-trasporto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mzt_mezzo_trasporto')->textInput(['maxlength' => 50]) ?>

    <?php
    
    echo $form->field($model, 'mzt_tipologia_id')
		     ->dropDownList($modelTipologia, ['prompt'=>'-Seleziona la tipologia di bici-']);	/*dm9-160223*/
    ?>
    
    <?= $form->field($model, 'mzt_data_inizio_utilizzo')->textInput(['value' => date( 'd/m/Y', strtotime( $model->mzt_data_inizio_utilizzo ))]) ?>

    <?= $form->field($model, 'mzt_data_fine_utilizzo')->textInput(['value' => date_format(  date_create($model->mzt_data_fine_utilizzo ) , 'd/m/Y')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
