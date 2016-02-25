<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UtenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ute_id') ?>

    <?= $form->field($model, 'ute_username') ?>

    <?= $form->field($model, 'ute_password') ?>

    <?= $form->field($model, 'ute_email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
