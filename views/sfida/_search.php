<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sfd_id') ?>

    <?= $form->field($model, 'sfd_titolo') ?>

    <?= $form->field($model, 'sfd_sotto_titolo') ?>

    <?= $form->field($model, 'sfd_descrizione') ?>

    <?= $form->field($model, 'sfd_data_pubblicaz') ?>

    <?php // echo $form->field($model, 'sfd_data_inizio') ?>

    <?php // echo $form->field($model, 'sfd_data_fine') ?>

    <?php // echo $form->field($model, 'sfd_specialita_id') ?>

    <?php // echo $form->field($model, 'sfd_tipologia_id') ?>

    <?php // echo $form->field($model, 'sfd_obiettivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
