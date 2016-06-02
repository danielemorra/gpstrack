<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manutenzione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mtz_data_interv')->textInput(['value' => date( 'd/m/Y', strtotime( $model->mtz_data_interv ))]) ?>

    <?= $form->field($model, 'mtz_descrizione')->textInput(['maxlength' => 100]) ?>

    <?php
    /*dm9 inizio*/  
    echo $form->field($model, 'mtz_componente_id')
		     ->dropDownList($modelComponenti, ['prompt'=>'-Seleziona il componente-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>

    
    <?= $form->field($model, 'mtz_data_inizio_tracking')->textInput(['value' => date( 'd/m/Y', strtotime( $model->mtz_data_inizio_tracking ))]) ?>

    <?= $form->field($model, 'mtz_data_fine_tracking')->textInput(['value' => date_format(  date_create($model->mtz_data_fine_tracking ) , 'd/m/Y')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
