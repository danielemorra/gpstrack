<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipologiaMzt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipologia-mzt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tmz_tipologia')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
