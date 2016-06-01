<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">
    <br><br>
    <h1>Ups! Error (#404)</h1>

    <div class="alert alert-danger">
       :( <?= nl2br(Html::encode($message)) ?> 
    </div>

    <p>
        Se ha producido un error mientras que el servidor procesaba su solicitud.
    </p>
    <p>
        Póngase en contacto con nosotros por cualquier duda o sugerencia. Gracias.
    </p>

</div>
