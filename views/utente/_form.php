<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ute_username')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'ute_password_hash')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ute_auth_key')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'ute_access_token')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ute_email')->textInput(['maxlength' => 128]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
