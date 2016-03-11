<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UtilizzoComponente */

$this->title = 'Create Utilizzo Componente';
$this->params['breadcrumbs'][] = ['label' => 'Utilizzo Componentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizzo-componente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelComponenti' => $modelComponenti,				/*dm9-160227*/
        'modelMezzoTrasporto' => $modelMezzoTrasporto,		/*dm9-160227*/
    ]) ?>

</div>
