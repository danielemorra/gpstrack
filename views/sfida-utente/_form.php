<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-utente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sfu_obiettivo_raggiunto')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfu_utente_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfu_sfida_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfu_flag_obiettivo_centrato')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
