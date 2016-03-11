<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sfd_titolo')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'sfd_sotto_titolo')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sfd_descrizione')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'sfd_data_pubblicaz')->textInput() ?>

    <?= $form->field($model, 'sfd_data_inizio')->textInput() ?>

    <?= $form->field($model, 'sfd_data_fine')->textInput() ?>

    <?= $form->field($model, 'sfd_specialita_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfd_tipologia_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfd_obiettivo')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
