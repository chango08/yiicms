<?php

namespace backend\models;

use Yii;
use Yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categorias".
 *
 * @property integer $id_categoria
 * @property string $nombre
 * @property string $alias
 * @property string $descripcion
 * @property integer $estado
 *
 * @property Notas[] $notas
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado'], 'integer'],
            [['nombre','color', 'alias'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 150]
        ];
    }
    
  

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'alias' => 'Alias',
            'descripcion' => 'Descripcion',
            'color' => 'Color',
            'estado' => 'Estado',
        ];
    }    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Notas::className(), ['categorias_id_categoria' => 'id_categoria']);
    }
    
    public static function getById($id){
        return self::findOne(['id_categoria' => $id, 'estado' => 0]);
    }
}
