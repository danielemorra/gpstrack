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

    <?php // echo $form->field($model, 'sfd_id') ?>

    <?php // echo $form->field($model, 'sfd_sfida_obiet') ?>

    <?php // echo $form->field($model, 'sfd_titolo') ?>

    <?php // echo $form->field($model, 'sfd_sotto_titolo') ?>

    <?php // echo $form->field($model, 'sfd_descrizione') ?>

    <?php // echo $form->field($model, 'sfd_data_pubblicaz') ?>

    <?php // echo $form->field($model, 'sfd_data_inizio') ?>

    <?php // echo $form->field($model, 'sfd_data_fine') ?>

    <?php // echo $form->field($model, 'sfd_specialita_id') ?>

    <?php // echo $form->field($model, 'sfd_tipologia_id') ?>

    <?php // echo $form->field($model, 'sfd_obiettivo') ?>

    <?php // echo $form->field($model, 'sfd_image_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
