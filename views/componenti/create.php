<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Componenti */

$this->title = 'Nuovo Componente';
$this->params['breadcrumbs'][] = ['label' => 'Componenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componenti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelFornitori' => $modelFornitori,		/*dm9-160227*/
        'modelCategoria' => $modelCategoria,		/*dm9-160227*/
        'modelUbicazCompon' => $modelUbicazCompon,	/*dm9-160227*/
    ]) ?>

</div>
