<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-utente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sfu_id') ?>

    <?= $form->field($model, 'sfu_obiettivo_raggiunto') ?>

    <?= $form->field($model, 'sfu_utente_id') ?>

    <?= $form->field($model, 'sfu_sfida_id') ?>

    <?= $form->field($model, 'sfu_flag_obiettivo_centrato') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
