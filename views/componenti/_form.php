<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Componenti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="componenti-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--*dm9*<?= $form->field($model, 'cmp_marca')->textInput(['maxlength' => 50]) ?>-->

    <!--*dm9*<?= $form->field($model, 'cmp_modello')->textInput(['maxlength' => 50]) ?>-->

    <?= $form->field($model, 'cmp_componente')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cmp_mostra_in_home')->checkbox() ?>

    <?= $form->field($model, 'cmp_qta_acq')->textInput() ?>

    <?= $form->field($model, 'cmp_prz_acq_unit')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'cmp_data_acquisto')->textInput(['value' => date( 'd/m/Y', strtotime( $model->cmp_data_acquisto ))]) ?>

    <?= $form->field($model, 'cmp_data_dismissione')->textInput(['value' => date_format(  date_create($model->cmp_data_dismissione ) , 'd/m/Y') ]) ?>

    <?= $form->field($model, 'cmp_qta_util')->textInput() ?>

    <?= $form->field($model, 'cmp_mystuff2')->checkbox() ?>
    
    <?php
    /*dm9 inizio*/  
    echo $form->field($model, 'cmp_id_frn')
		     ->dropDownList($modelFornitori, ['prompt'=>'-Seleziona il negozio-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>
    
    <?php
    /*dm9 inizio*/  
    echo $form->field($model, 'cmp_id_cat')
		     ->dropDownList($modelCategoria, ['prompt'=>'-Seleziona la categoria-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>
    
    <?php
    /*dm9 inizio*/  
    echo $form->field($model, 'cmp_id_ubc')
		     ->dropDownList($modelUbicazCompon, ['prompt'=>'-Seleziona ubicazione-']);		/*dm9-160223*/
    /*dm9 fine*/  
    ?>

<!-- <?//= $form->field($model, 'cmp_utente_id')->textInput(['maxlength' => 10]) ?>-->

    <?= $form->field($model, 'cmp_note')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
