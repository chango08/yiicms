<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\widgets\Alert;
use common\models\Metodos;
use yii\web\View;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerJs('$().ready(function(){
             $("#myCarousel").carousel({
            interval: 4500
            });
        });
', View::POS_READY);

?>
 <?php  $frases = Metodos::getFrases(); 
 ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href='/psicomc/frontend/web/images/favicon.ico' />
   
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
       
        <?php
            NavBar::begin([
                'brandLabel' =>  '<img src= "'. Yii::$app->getUrlManager()->getBaseUrl() .'/images/logo.png" class="img-responsive" width="85%" style="margin-top: -9px;">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-fixed-top',                    
                ],
            ]);
            $menuItems = [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Sobre mí', 'url' => ['/site/about']],
                 [
                    'label' => 'Temáticas',
                     'url' => ['/site/categoria'],                   
                    'items' => Metodos::getCategoriasModel(),                    
                ],
                ['label' => 'Contacto', 'url' => ['/site/contact']],
                
            ];           
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>      
              
        
        <?php  if(Yii::$app->controller->getRoute() == "site/index"){ ?>          
       
        <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
          <li data-target="#myCarousel" data-slide-to="5"></li>
          <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>
         <div class="carousel-inner">
             <img src="<?= Yii::$app->getUrlManager()->getBaseUrl()?> /images/bg_header.jpg" style="width:100%" class="img-responsive">
       
       <div class="item active">
          <div class="container">
            <div class="carousel-caption">
              <h1><?= $frases[0]["frase"] ?></h1>
              <p><?= $frases[0]["autor"] ?></p>
            </div>
          </div>
        </div>
       <?php array_shift($frases);
       foreach($frases as $objeto) {   ?>      
         <div class="item">
            <div class="container">
              <div class="carousel-caption">
              <h1><?= $objeto["frase"] ?></h1>
              <p><?= $objeto["autor"] ?></p>
            </div>
          </div>
        </div>
        <?php  } ?>
      </div>
         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
      </a>  
    </div>       
       
        <?php } else { echo "<br>";} ?>    
        
        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

   
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="vertical-center"><span class="glyphicon glyphicon-copyright-mark" ></span> 
                        <a class="afooter" href="http://WEBPAGE.com.ar">Lic. TONY MEOLA</a> <?= date('Y') ?>
                    </p>                 
                </div>
                <div class="col-lg-6 ">
                    <p class="text-right"><span class="glyphicon glyphicon-map-marker" ></span> SUIPACHA - (525) PSOEL</p></p>
                    <p class="text-right"><span class="glyphicon glyphicon-phone" ></span> 05254-15245244</p>
                    <p class="text-right"><span class="glyphicon glyphicon-envelope" ></span><a  class="afooter" href="mailto:morelcortes@gmail.com"> CORREO@gmail.com</a></p>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
