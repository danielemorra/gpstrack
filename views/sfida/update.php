<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

($model->sfd_sfida_obiet == 1) ? $tipoSfdObt = 'Sfida' : $tipoSfdObt = 'Obiettivo';
$this->title = $tipoSfdObt .' | ' .$model->sfd_titolo;
$this->params['breadcrumbs'][] = ['label' => 'Sfide e Obiettivi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfd_titolo, 'url' => ['view', 'id' => $model->sfd_id]];
$this->params['breadcrumbs'][] = 'Modifica';

?>
<div class="sfida-update">

    <h1>
        <?php
        echo $tipoSfdObt .' - '. Html::encode($model->sfd_titolo)
        ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSpecialita' => $modelSpecialita,
        'modelTipologia' => $modelTipologia,
    ]) ?>

</div>
