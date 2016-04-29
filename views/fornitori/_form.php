<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fornitori-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'frn_nome')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'frn_sito_web')->textInput(['maxlength' => 100]) ?>

    <!--<?//= $form->field($model, 'frn_utente_id')->textInput(['maxlength' => 10]) ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
