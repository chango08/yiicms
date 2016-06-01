<?php
use backend\models\Categorias;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
 
/* @var $this yii\web\View */
$this->title = 'Lic. TONY MEOLA';


?>
<?php 
       
         Modal::begin([
             'header'=>'<h3 class="tituloBack">Buscar</h3>',
             'id'=>'modalBuscar',
             'size'=>'modal-sm',
         ]);
         echo "<div id='modalContent'></div>";
         Modal::end();
        ?>   
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                
                <div class="col-lg-8">
                    <h3 class="tituloBack">Notas</h3> 
                    
                        <?php foreach($model as $objeto) {   
                        $cat = Categorias::getById($objeto['categorias_id_categoria']) ?>
                        <div class="row bloqueNotas">
                        <div class="col-lg-12"> 
                           <a href='<?=  Url::toRoute(['site/categoria', 'id' => $objeto["categorias_id_categoria"]]) ?>'>
                               <p class="labelCategoria pull-right" style="background-color: <?= $cat['color']?>;"><?= $cat['nombre'] ?></p>
                           </a>

                           <a href='<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>'>
                                <h3 class="titNotaHorizontal"><?= $objeto['titulo'] ?></h3> 
                           </a>     
                        </div>

                        <div class="col-lg-12">
                          <div class="col-lg-3 hidden-xs">
                              <a class="shadow" href='<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>'>
                                <img src= "/psicomc/backend/web/<?= $objeto['imagen'] = $objeto['imagen'] == null? 'images/imagen.jpg': $objeto['imagen']?>" class="thumb slickHoverZoom">
                              </a> 
                          </div>

                          <div class="col-lg-9">
                              <div class="justificar"><p><?= $objeto['texto']?></p></div>
                              <a class="btn btn-default  btn-leer-cat" href="<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>">leer &raquo;</a>
                          </div>       
                             
                     
                        </div>        
                        </div>     
                        <?php }  ?>   
                       
                </div>
                
                <div class="col-lg-4">
                     <h3 class="tituloBack">Noticias</h3>                      
                        <?php foreach($noti as $objeto) { ?> 
                            <div class="row bloqueNotas">
                                <div class="col-lg-12">
                                    <a href='<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>'>
                                      <h4 class="titNotaHorizontal"><?= $objeto['titulo'] ?></h4> 
                                    </a>
                                    <div class="row">                                        
                                        <div class="col-lg-12 hidden-xs">
                                            <a class="shadow" href='<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>'>
                                             <img src= "/psicomc/backend/web/<?= $objeto['imagen'] ?>" class="thumbNoti slickHoverZoom">
                                            </a>      
                                        </div> 
                                    </div>    
                                    <div class="justificar margen-noti"><p><?= $objeto['texto']?></p></div>

                                    <a class="btn btn-default  btn-leer-noti" href="<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>">leer &raquo;</a>
                                </div>
                            </div>
                               
                                   
                        <?php }  ?>  
                    
                </div>
                 
            </div>
            <div class="col-lg-4">
                 <?=  Html::button('<i class="glyphicon glyphicon-search"></i> Buscar',['value'=>Url::toRoute('/site/buscar'),'class'=>'btn btn-default  btn-block','id'=>'buscar']); ?>
                <br>
                <iframe width="360" height="255" src="https://www.youtube.com/embed/RYhXf88ACSw" frameborder="0" allowfullscreen></iframe>
                <h3 class="tituloBack">Tags</h3> 
                <div class="row text-center">
                    <?php foreach($tags as $objeto) { ?> 
                       <a class="btn btn-sm-tag btn-tag" href="<?=  Url::toRoute(['site/tags', 'id' => $objeto["tag"]]) ?>">
                           <i class="glyphicon glyphicon-tag"></i><b>&MediumSpace;<?= $objeto["tag"] ?></b>
                       </a>                   
                    <?php }  ?> 
                </div>           
            </div> 
        </div>
        <div class="row">
             <div class="col-lg-8">
                
            
           
           
           
                
            </div>
        </div>

    </div>
</div>
