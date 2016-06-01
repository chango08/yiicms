<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use common\models\Metodos;

/* @var $this yii\web\View */
/* @var $model app\models\categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
        'options' => ['placeholder' => 'Elija color ...'],
    ]); ?>
    <?= $form->field($model, 'estado')->dropDownList(Metodos::getData('estados',null)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
