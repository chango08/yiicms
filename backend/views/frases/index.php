<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Metodos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FrasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Frases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frases-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Frases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_frase',
            'frase:ntext',
            'autor',
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
