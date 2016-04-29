<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sfida */

($model->sfd_sfida_obiet == 1) ? $tipoSfdObt = 'Sfida' : $tipoSfdObt = 'Obiettivo';
$this->title = 'Crea ' .$tipoSfdObt;
$this->params['breadcrumbs'][] = ['label' => $tipoSfdObt, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSpecialita' => $modelSpecialita,
        'modelTipologia' => $modelTipologia,
    ]) ?>

</div>
