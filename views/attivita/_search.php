<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AttivitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attivita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ats_id') ?>

    <?= $form->field($model, 'ats_data') ?>

    <?= $form->field($model, 'ats_mezzo_trasporto_id') ?>

    <?= $form->field($model, 'ats_tempo') ?>

    <?= $form->field($model, 'ats_distanza_km') ?>

    <?php // echo $form->field($model, 'ats_dislivello') ?>

    <?php // echo $form->field($model, 'ats_percorso') ?>

    <?php // echo $form->field($model, 'ats_utente_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
