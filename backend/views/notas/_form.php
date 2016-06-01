<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Metodos;
use backend\models\Notas;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\notas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'titulo')->textInput(['maxlength' => 150]) ?>
    <div class="row">
         <div class="col-md-6">
          <?= $form->field($model, 'categorias_id_categoria')->dropDownList(Metodos::getCategorias()); ?>
         </div>
        <div class="col-md-6">
         <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*',],
              'pluginOptions' => [
                'showUpload' => false,
                'allowedFileExtensions' => ['jpg', 'png'],],
        ]); ?>
        </div>
    
    </div>   
    
    <?= $form->field($model, 'texto')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl'=>Yii::$app->getUrlManager()->createUrl('notas/url')
        ]
    ]) ?>    
        
    <label>Tags relacionados al artículo (separado por comas)</label>
    <?= Html::input(null, 'tags',null, 
    ['class' => 'form-control']) ?>
    <br>
    
    <div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'fecha')->widget(
           DatePicker::className(), [
               // inline too, not bad
               'inline' => false, 
               // modify template for custom rendering
              // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
               'clientOptions' => [
                   'autoclose' => true,
                   'format' => 'dd-mm-yyyy'
               ]
       ])?>
   </div>
    <div class="col-md-4">
        <?= $form->field($model, 'videos')->textInput(['maxlength' => 255]) ?>
     </div>
        <div class="col-md-4">
        <?= $form->field($model, 'estado')->dropDownList(Notas::getEstado()); ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
