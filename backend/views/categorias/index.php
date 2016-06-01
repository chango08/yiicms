<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Metodos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Categorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_categoria',
            'nombre',
            'alias',
            'descripcion',
            ['attribute'=>'color',
             'label' => 'Color',
             'contentOptions' => function ($model){
            return ['style'=>'color:'.$model->color.';background-color:'.$model->color.';width: 65px;'];
             },     
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

</div>
