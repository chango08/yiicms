<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\notas */

$this->title = 'Crear Notas';
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
