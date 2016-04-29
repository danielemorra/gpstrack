<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SfidaUtente */

$this->title = 'Nuova Sfida Utente';
$this->params['breadcrumbs'][] = ['label' => 'Sfida Utente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sfida-utente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
