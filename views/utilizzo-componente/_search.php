<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilizzo-componente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'utc_id') ?>

    <?= $form->field($model, 'utc_componente_id') ?>

    <?= $form->field($model, 'utc_qta_utilizzo') ?>

    <?= $form->field($model, 'utc_mezzo_id') ?>

    <?= $form->field($model, 'utc_data_montaggio') ?>

    <?php // echo $form->field($model, 'utc_data_smontaggio') ?>

    <?php // echo $form->field($model, 'utc_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
