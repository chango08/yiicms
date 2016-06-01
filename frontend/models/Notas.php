<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notas".
 *
 * @property integer $id_nota
 * @property string $titulo
 * @property string $texto
 * @property string $fecha
 * @property integer $visitas
 * @property integer $me_gusta
 * @property string $adjuntos
 * @property integer $destacado
 * @property integer $remarcado
 * @property string $videos
 * @property string $imagen
 * @property integer $estado
 * @property integer $user_id
 * @property integer $categorias_id_categoria
 *
 * @property Categorias $categoriasIdCategoria
 * @property User $user
 * @property Tags[] $tags
 */
class Notas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['texto'], 'string'],
            [['fecha'], 'safe'],
            [['visitas', 'me_gusta', 'destacado', 'remarcado', 'estado', 'user_id', 'categorias_id_categoria'], 'integer'],
            [['user_id', 'categorias_id_categoria'], 'required'],
            [['titulo'], 'string', 'max' => 150],
            [['adjuntos', 'videos', 'imagen'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nota' => 'Id Nota',
            'titulo' => 'Titulo',
            'texto' => 'Texto',
            'fecha' => 'Fecha',
            'visitas' => 'Visitas',
            'me_gusta' => 'Me Gusta',
            'adjuntos' => 'Adjuntos',
            'destacado' => 'Destacado',
            'remarcado' => 'Remarcado',
            'videos' => 'Videos',
            'imagen' => 'Imagen',
            'estado' => 'Estado',
            'user_id' => 'User ID',
            'categorias_id_categoria' => 'Categorias Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriasIdCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id_categoria' => 'categorias_id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['notas_id_nota' => 'id_nota']);
    }
}
