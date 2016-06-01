<?php

namespace common\models;

use Yii;
use backend\models\Categorias;
use backend\models\Frases;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Metodos
{
    public static $estados = ['0'=>'Activo','1'=>'Pendiente','2'=>'Inactivo'];
    
    public static function getData($name,$key=null){
        if($key!== null)
                return self::${$name}[$key];
        return self::${$name};
    }
    
    public static function getDateTime($date,$for){
        switch ($for) {
            case 'db':
                return date( 'Y-m-d', strtotime($date));

            case 'show':
                if($date==null)
                    return null;
                return date( 'd-m-Y', strtotime($date));
        }
    }
  
    public static function getCategorias($key=null){
        if ($key == null) {
            return ArrayHelper::map(Categorias::find()->orderBy('nombre')->all(), 'id_categoria', 'nombre');
        }else{
        return ArrayHelper::map(Categorias::find()
                        ->where('id_categoria = :id_categoria', [':id_categoria' => $key])
                        ->all(), 'id_categoria', 'nombre'); }
    }
    
    public static function getCategoriasModel(){
        $items = [];
        $models = Categorias::find()->all();
        foreach($models as $model) {
           $items[] = ['label' => $model->nombre, 'url' => Url::toRoute(['site/categoria', 'id' => $model->id_categoria])];
        }     
        return $items;    
    }
    
    public static function getFrases(){
        //traemos las frases aleatoriamente
        $sql = 'SELECT id_frase,frase,autor,estado FROM frases WHERE estado=0 ORDER BY RAND() LIMIT 7';
        return Frases::findBySql($sql)->all();	
    }
    
   
}
