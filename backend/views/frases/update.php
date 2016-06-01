<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Frases */

$this->title = 'Actualizar Frases: ' . ' ' . $model->id_frase;
$this->params['breadcrumbs'][] = ['label' => 'Frases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_frase, 'url' => ['view', 'id' => $model->id_frase]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="frases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
