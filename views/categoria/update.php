<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Modifica Categoria: ' . ' ' . $model->cat_categoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_categoria, 'url' => ['view', 'id' => $model->cat_id]];
$this->params['breadcrumbs'][] = 'Modifica';
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
