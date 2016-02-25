<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilizzo-componente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    /*dm9 inizio*/  
    echo $form->field($model, 'utc_componente_id')
		     ->dropDownList($modelComponenti, ['prompt'=>'-Seleziona il componente-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>
        
    <?= $form->field($model, 'utc_qta_utilizzo')->textInput() ?>

    <?php
    /*dm9 inizio*/
    echo $form->field($model, 'utc_mezzo_id')
		     ->dropDownList($modelMezzoTrasporto, ['prompt'=>'-Seleziona la bici-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>
    
    
    <?= $form->field($model, 'utc_data_montaggio')->textInput() ?>

    <?= $form->field($model, 'utc_data_smontaggio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
