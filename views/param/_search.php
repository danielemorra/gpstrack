<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="param-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'par_id') ?>

    <?= $form->field($model, 'par_parametro') ?>

    <?= $form->field($model, 'par_leggi_campo') ?>

    <?= $form->field($model, 'par_campo_num') ?>

    <?= $form->field($model, 'par_campo_str') ?>

    <?php // echo $form->field($model, 'par_campo_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
