<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'GpsTrack 1.3';
?>
<div class="site-index">

    <div class="body-content">

        <h1>Sfide</h1>
        <cite>Iscriviti a una o piu' sfide e mettiti a confronto con te stesso</cite>
        <?php $form = ActiveForm::begin([
            'id' => 'statistiche-form',
            'options' => ['class' => 'form-inline'],
            'fieldConfig' => [
//	            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'template' => "<div>{label}\n{input}</div><div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <div style="/*background-color: #9d9d9d;*/ padding: 8px; margin-top: 8px; margin-bottom: 8px;">
                <?php //$sfidaIscrizModel->statoSfida = !isset($sfidaIscrizModel->statoSfida) ? "1" : $sfidaIscrizModel->statoSfida; ?>
                <?= $form->field($sfidaIscrizModel, 'statoSfida')->dropDownList(
                    ['0' => 'Tutte le sfide', '1' => 'Solo sfide in corso/imminenti', '2' => 'Solo sfide in corso', '3' => 'Solo sfide imminenti', '4' => 'Solo sfide terminate'],
                    ['options' => [$sfidaIscrizModel->statoSfida => ['Selected'=>'selected']]]
//                    ['prompt'=>'Select Option']
                )
                    ->label(false) ?>
                <?= $form->field($sfidaIscrizModel, 'tipologia')->dropDownList(
                    $listTipologia,
                    ['prompt' => 'Tutte le tipologie']
                )
                    ->label(false) ?>
                <?php //$sfidaIscrizModel->specialita = !isset($sfidaIscrizModel->specialita) ? date('n') : $sfidaIscrizModel->specialita; ?>
                <?= $form->field($sfidaIscrizModel, 'specialita')->dropDownList(
                    $listSpecialita,
                    ['prompt' => 'Tutte le specialita']
                )
                    ->label(false) ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Filtra', ['class' => 'btn btn-primary', 'name' => 'update-sfide-button']) ?>
                    </div>
                </div>
        </div>

        <div>
            <?php
            foreach ($sfidaModel->each() as $row) {
                    echo $row['sfd_id'] ." - ". $row['sfd_titolo'] ." - ". date("d/m/Y", strtotime($row['sfd_data_pubblicaz'])) ."<BR>";
            }
            ?>
        </div>
        
        <?php ActiveForm::end(); ?>

    </div>
</div>
