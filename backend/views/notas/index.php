<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Metodos;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NotasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Notas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_nota',
             [
                'attribute' => 'categorias_id_categoria',
                'label' => 'Categoría',                 
                'value' => 'categoriasIdCategoria.nombre',
               "filter"=> Metodos::getCategorias(null),
            ],
            'titulo',
            'texto:ntext',
            [
                'attribute' => 'fecha',
                'value'=>  function ($model) {
                    return Metodos::getDateTime($model->fecha,'show'); },
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]),            
            ],
            [
                'attribute' => 'imagen',
                'format' => 'image',
                //'value'=>function($model) { return Yii::$app->request->BaseUrl.$model->imagen; },
            ],
             [
                'attribute' => 'estado',
                'label'=>'Estado',
                'format' => 'text',  
                'filter' =>  Metodos::getData('estados',null),
                'value'=>  function ($model) {
                    return Metodos::getData('estados',$model->estado); },
                'contentOptions'=>['style'=>'width: 85px;']             
             ],
            
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>