<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Frases */

$this->title = 'Crear Frases';
$this->params['breadcrumbs'][] = ['label' => 'Frases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frases-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
