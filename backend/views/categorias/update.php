<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\categorias */

$this->title = 'Actualizar Categorias: ' . ' ' . $model->id_categoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria, 'url' => ['view', 'id' => $model->id_categoria]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
