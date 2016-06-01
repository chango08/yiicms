<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Frases */

$this->title = $model->id_frase;
$this->params['breadcrumbs'][] = ['label' => 'Frases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_frase], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_frase], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_frase',
            'frase:ntext',
            'autor',
            'estado',
        ],
    ]) ?>

</div>
