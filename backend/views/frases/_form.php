<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Metodos;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Frases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frases-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'frase')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'estado')->dropDownList(Metodos::getData('estados',null)) ?>
        </div>

    
    </div>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
