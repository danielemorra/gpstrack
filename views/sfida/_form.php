<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sfida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$model->sfd_sfida_obiet = '1'; ?>
    <!--<?//= $form->field($model, 'sfd_sfida_obiet')->radioList([
//        '1' => 'Sfida',
//        '2' => 'Obiettivo',
//    ])->label(false);
//    ?>-->

    <?= $form->field($model, 'sfd_titolo')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'sfd_sotto_titolo')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'sfd_descrizione')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'sfd_data_pubblicaz')->textInput(['value' => date( 'Y-m-d', strtotime( $model->sfd_data_pubblicaz ) )]) ?>

    <?= $form->field($model, 'sfd_data_inizio')->textInput(['value' => date( 'Y-m-d', strtotime( $model->sfd_data_inizio ) )]) ?>

    <?= $form->field($model, 'sfd_data_fine')->textInput(['value' => date( 'Y-m-d', strtotime( $model->sfd_data_fine ) )]) ?>

    <?= $form->field($model, 'sfd_specialita_id')
                            ->dropDownList($modelSpecialita, ['prompt'=>'-Seleziona la specialita-']); ?>

    <?= $form->field($model, 'sfd_tipologia_id')
        ->dropDownList($modelTipologia, ['prompt'=>'-Seleziona la tipologia-']); ?>

    <?= $form->field($model, 'sfd_obiettivo')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'sfd_image_url')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
