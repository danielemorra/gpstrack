<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaSpecialita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-specialita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sfs_specialita')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sfs_um')->textInput(['maxlength' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
