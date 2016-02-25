<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ManutenzioneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manutenzione-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mtz_id') ?>

    <?= $form->field($model, 'mtz_data_interv') ?>

    <?= $form->field($model, 'mtz_descrizione') ?>

    <?= $form->field($model, 'mtz_componente_id') ?>

    <?= $form->field($model, 'mtz_data_inizio_tracking') ?>

    <?php // echo $form->field($model, 'mtz_data_fine_tracking') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
