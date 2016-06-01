<?php
use backend\models\Categorias;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = 'Listado de Notas por Tag';
$this->params['breadcrumbs'][] = $this->title;
?>
   <div class="body-content">

        <div class="row">
            <div class="col-lg-8">                
             
                 <?php foreach($model as $objeto) {   
                    $cat = Categorias::getById($objeto['categorias_id_categoria']) ?>
                 
                 <div class="col-lg-12"> 
                    <a href='<?=  Url::toRoute(['site/categoria', 'id' => $objeto["categorias_id_categoria"]]) ?>'>
                        <p class="label pull-right" style="background-color: <?= $cat['color']?>;"><?= $cat['nombre'] ?></p>
                    </a>
                    <a href='/psicomc/frontend/web/index.php/site/articulo/<?= $objeto["id_nota"] ?>'>
                         <h3 class="titNotaHorizontal"><?= $objeto['titulo'] ?></h3> 
                    </a>     
                 </div>
                 <div class="col-lg-12">
                      <div class="col-lg-3">
                          <a href='<?=  Url::toRoute(['site/categoria', 'id' => $objeto["categorias_id_categoria"]]) ?>'>
                            <img src= "/psicomc/backend/web/<?= $objeto['imagen'] ?>" class="thumbCat  slickHoverPlusWhite">
                          </a> 
                      </div>
                              
                      <div class="col-lg-9">
                          <p><?= substr($objeto['texto'], 0, 360)." ..."  ?></p>
                              <p><a class="btn btn-default " href="<?=  Url::toRoute(['site/categoria', 'id' => $objeto["categorias_id_categoria"]]) ?>">leer &raquo;</a></p>
                      </div>         
                </div>                  
              <?php }  ?>  
                <?= LinkPager::widget(['pagination' => $pagination]) ?> 

           </div>
            <div class="col-lg-4">
                <iframe width="360" height="255" src="https://www.youtube.com/embed/RYhXf88ACSw" frameborder="0" allowfullscreen></iframe>
            </div> 
        </div>
   </div>
