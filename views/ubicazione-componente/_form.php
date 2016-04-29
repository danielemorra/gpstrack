<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UbicazioneComponente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicazione-componente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ubc_contenitore')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ubc_ubicazione')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ubc_note')->textInput(['maxlength' => 100]) ?>

    <!--<?//= $form->field($model, 'ubc_utente_id')->textInput(['maxlength' => 10]) ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
