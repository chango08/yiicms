<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modelsNotasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nota') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'visitas') ?>

    <?php // echo $form->field($model, 'me_gusta') ?>

    <?php // echo $form->field($model, 'adjuntos') ?>

    <?php // echo $form->field($model, 'destacado') ?>

    <?php // echo $form->field($model, 'remarcado') ?>

    <?php // echo $form->field($model, 'videos') ?>

    <?php // echo $form->field($model, 'imagen') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'categorias_id_categoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
