<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rutas */

$this->title = 'Actualizar Ruta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rutas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'proyectos' => $proyecto,
    ]) ?>

</div>
