<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\notas */

$this->title = 'Actualizar Notas: ' . ' ' . $model->id_nota;
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nota, 'url' => ['view', 'id' => $model->id_nota]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="notas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
