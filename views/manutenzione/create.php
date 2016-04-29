<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Manutenzione */

$this->title = 'Nuova Manutenzione';
$this->params['breadcrumbs'][] = ['label' => 'Manutenzioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manutenzione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelComponenti' => $modelComponenti,		/*dm9-160227*/
    ]) ?>

</div>
