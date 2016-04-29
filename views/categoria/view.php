<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Categorie | ' .$model->cat_categoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->cat_categoria;
?>
<div class="categoria-view">

    <h1><?= Html::encode($model->cat_categoria) ?></h1>

    <p>
        <?= Html::a('Nuova Categoria', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Modifica', ['update', 'id' => $model->cat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina', ['delete', 'id' => $model->cat_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vuoi eliminare defitivamente questa Categoria ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cat_id',
            'cat_categoria',
            'cat_livello',
        ],
    ]) ?>

</div>
