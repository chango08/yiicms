<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contacto';
?>
<div class="site-contact">
    <br><br>
    <h2><?= Html::encode($this->title) ?></h2>

    <p><span class="glyphicon glyphicon-map-marker" ></span> SUIPACHA - (525) PSOEL</p>
    <p><span class="glyphicon glyphicon-phone" ></span> 05254-15245244</p>
    <p><span class="glyphicon glyphicon-envelope" ></span> CORREO@gmail.com</p>
    <p>
        Deje su mensaje, será contestado en breve.       
    </p>

    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name') ?>
             <div class="row">
                 <div class="col-lg-6">
                <?= $form->field($model, 'email') ?></div>
                 <div class="col-lg-6">
                <?= $form->field($model, 'telefono') ?></div>
             </div>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-3">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-tag', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
