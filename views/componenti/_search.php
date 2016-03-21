<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComponentiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="componenti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cmp_id') ?>

    <?= $form->field($model, 'cmp_marca') ?>

    <?= $form->field($model, 'cmp_modello') ?>

    <?= $form->field($model, 'cmp_componente') ?>

    <?= $form->field($model, 'cmp_qta_acq') ?>

    <?php // echo $form->field($model, 'cmp_prz_acq_unit') ?>

    <?php // echo $form->field($model, 'cmp_data_acquisto') ?>

    <?php // echo $form->field($model, 'cmp_data_dismissione') ?>

    <?php // echo $form->field($model, 'cmp_qta_util') ?>

    <?php // echo $form->field($model, 'cmp_mystuff2') ?>

    <?php // echo $form->field($model, 'cmp_mostra_in_home') ?>

    <?php // echo $form->field($model, 'cmp_id_frn') ?>

    <?php // echo $form->field($model, 'cmp_id_cat') ?>

    <?php // echo $form->field($model, 'cmp_id_ubc') ?>

    <?php // echo $form->field($model, 'cmp_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
