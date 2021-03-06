<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Rutas */

$this->title = 'Crear Ruta';
$this->params['breadcrumbs'][] = ['label' => 'Rutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rutas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'proyectos' => $proyecto,
    ]) ?>

</div>
