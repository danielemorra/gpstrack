<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fornitori */

$this->title = 'Nuovo Venditore';
$this->params['breadcrumbs'][] = ['label' => 'Fornitori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornitori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
