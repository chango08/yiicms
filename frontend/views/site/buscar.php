<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
?>
<div class="site-login">
    
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'buscar-form']); ?>
              
                <?= Html::input(null, 'buscar',null, 
                ['class' => 'form-control',
                 'placeholder'=>'Ingrese el texto que desea buscar...']) ?>
                <br>
               
                <div class="form-group">
                    <?= Html::submitButton('Buscar', ['class' => 'btn btn-tag', 'name' => 'buscar-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
