<?php
use backend\models\Categorias;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = $texto;
?>
   <div class="body-content">
      
        <div class="row">
            <br><br>
            
            <div class="col-lg-8">                
              <h2 class="tituloBack"><?= Html::encode($this->title) ?></h2>
                 <?php  $cont= 0;
                 foreach($model as $objeto) {   
                     $cont++;
                    $cat = Categorias::getById($objeto['categorias_id_categoria']) ?>
                <div class="row bloqueNotas">
                 <div class="col-lg-12"> 
                    <a href='<?=  Url::toRoute(['site/categoria', 'id' => $objeto["categorias_id_categoria"]]) ?>'>
                        <p class="labelCategoria pull-right" style="background-color: <?= $cat['color']?>;"><?= $cat['nombre'] ?></p>
                    </a>
                    <a href='/psicomc/frontend/web/index.php/site/articulo?id=<?= $objeto["id_nota"] ?>'>
                         <h3 class="titNotaHorizontal"><?= $objeto['titulo'] ?></h3> 
                    </a>     
                 </div>
                 <div class="col-lg-12">
                      <div class="col-lg-3">
                          <a href='<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>'>
                            <img src= "/psicomc/backend/web/<?= $objeto['imagen'] ?>" class="thumbCat  slickHoverZoom">
                          </a> 
                      </div>
                              
                      <div class="col-lg-9">
                          <div class="justificar"><p><?= substr($objeto['texto'], 0, 360)." ..."  ?></p></div>
                              <p><a class="btn btn-default btn-leer-cat" href="<?=  Url::toRoute(['site/articulo', 'id' => $objeto["id_nota"]]) ?>">leer &raquo;</a></p>
                      </div>         
                </div>                  
                </div> 
                    <?php }  
              if($cont==0){
                  echo "No hay resultados para la búsqueda.";
              }
              ?>  
                <?= LinkPager::widget(['pagination' => $pagination]) ?> 

           </div>
            <br><br>
            <div class="col-lg-4">
                <iframe width="360" height="255" src="https://www.youtube.com/embed/RYhXf88ACSw" frameborder="0" allowfullscreen></iframe>
            </div> 
        </div>
   </div>
