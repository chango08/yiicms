<?php

namespace backend\models;

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
 * @property User $user
 * @property Categorias $categoriasIdCategoria
 * @property Tags[] $tags
 */
class Notas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static $estado = ['0'=>'Activa','1'=>'Inactiva'];
    
    
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
            [['visitas', 'me_gusta', 'destacado', 'remarcado', 'categorias_id_categoria', 'estado', 'user_id'], 'integer'],
            [['user_id', 'categorias_id_categoria','titulo','texto'], 'required','message'=>'{attribute} no puede ser vacío.'],
            [['file'], 'file', 'extensions' => 'gif, jpg, png',],
            [['titulo'], 'string', 'max' => 150],
            [['adjuntos','imagen', 'videos'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nota' => 'Id Nota',
            'titulo' => 'Título',
            'texto' => 'Texto',
            'fecha' => 'Fecha',
            'visitas' => 'Visitas',
            'me_gusta' => 'Me Gusta',
            'adjuntos' => 'Adjuntos',
            'destacado' => 'Destacado',
            'remarcado' => 'Remarcado',
            'videos' => 'Video',
            'imagen' => 'Imagen',
            'file' => 'Imagen',
            'estado' => 'Estado',
            'user_id' => 'User ID',
            'categorias_id_categoria' => 'Categoría',
        ];
    }

    public static function getEstado($key=null){
        if($key !== null) {
            return self::$estado[$key];
        }
        return self::$estado;
        }
   
    public static function getNotas($key,$valor)
    {
        //lo primero dos return no tiene ->all() porque tiene que ser paginado
        if ($valor == null) {
         if ($key == null) {
            return Notas::find()->orderBy(['id_nota' => SORT_DESC,]);
        }else{
        return Notas::find()
                ->where('categorias_id_categoria = :categorias_id_categoria', [':categorias_id_categoria' => $key])
                ->orderBy(['id_nota' => SORT_DESC,]); }
        }else{
            if ($valor == 'notas'){
                return  Notas::find()
                ->joinWith('categoriasIdCategoria')       
                ->where(['NOT LIKE', 'categorias.alias', 'noticias'])
                ->orderBy(['id_nota' => SORT_DESC,])
                ->limit(8)
                ->all(); 
            }else{
                return  Notas::find()
                ->joinWith('categoriasIdCategoria')
                ->where('categorias.alias = "noticias"')
                ->orderBy(['id_nota' => SORT_DESC,])
                ->limit(10)
                ->all(); 
            }
        }       
    }
    
    public static function getNotasByTag($key)
    {
        //lo primero dos return no tiene ->all() porque tiene que ser paginado
        if ($key !== null) {
         return  Notas::find()
                ->joinWith('tags')       
                 ->where(['LIKE', 'tags.tag', $key])
                ->orderBy(['id_nota' => SORT_DESC,]); 
            }else{
                return  null;            
        }       
    }
    
     public static function getNotasBySearch($key)
    {
        //lo primero dos return no tiene ->all() porque tiene que ser paginado
        if ($key !== null) {
         return  Notas::find()      
                 ->where(['LIKE', 'titulo', $key])
                 ->orWhere(['LIKE', 'texto', $key])
                ->orderBy(['id_nota' => SORT_DESC,]); 
            }else{
                return  null;            
        }       
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
    public function getCategoriasIdCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id_categoria' => 'categorias_id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['notas_id_nota' => 'id_nota']);
    }
}
