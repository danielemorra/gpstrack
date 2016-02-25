<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Param */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="param-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'par_parametro')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'par_leggi_campo')->textInput() ?>

    <?= $form->field($model, 'par_campo_num')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'par_campo_str')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'par_campo_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
