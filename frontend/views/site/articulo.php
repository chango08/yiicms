<?php
use yii\helpers\Url;
use common\models\Metodos;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
$this->title = $model['titulo'];
?>
<?php 
       
         Modal::begin([
             'id'=>'modalVerImagen',
         ]);
         echo '<img src= "/psicomc/backend/web'.$model['imagen'].' ">';
         Modal::end();
        ?>  
   <div class="body-content">
        <div class="row">
            <br><br>
            <div class="col-lg-8">   <br>        
                <div class="col-lg-12">                    
                    <h2 class="titNotaHorizontal"><?= $model['titulo'] ?></h2> 
                    <a href='<?=  Url::toRoute(['site/categoria', 'id' => $cat["id_categoria"]]) ?>'>
                        <h4> <p class="labelCategoria pull-left" style="background-color: <?= $cat['color']?>;"><?= $cat['nombre'] ?></p> </h4>
                    </a>
                    <p class="text-right"><i>publicado el <?= Metodos::getDateTime($model['fecha'], 'show') ?></i></p>
                </div>
                <div class="col-lg-12">
                    <a href='#' id="verimagen">
                        <img src= "/psicomc/backend/web/<?= $model['imagen'] ?>" class="imagenArt">
                    </a>
                </div>
                <div class="col-lg-12"> 
                    <p class="texto"><?= $model['texto'] ?></p>                            
                </div>
                <div class="col-lg-12"> </div>
                <div class="col-lg-12"> 
                    <h5 class="tituloBack">Tags</h5> 
                    <?php foreach($tags as $objeto) { ?> 
                       <a class="btn btn-sm-tag btn-tag" href="<?=  Url::toRoute(['site/tags', 'id' => $objeto["tag"]]) ?>">
                       <i class="glyphicon glyphicon-tag"></i><b><?= $objeto["tag"] ?></b>
                       </a>                   
                <?php }  ?>                            
                </div>                   

           </div>
            <div class="col-lg-4">
                <iframe width="360" height="255" src="https://www.youtube.com/embed/RYhXf88ACSw" frameborder="0" allowfullscreen></iframe>
            </div> 
        </div>
   </div>
