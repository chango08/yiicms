<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id_tag
 * @property string $tag
 * @property integer $notas_id_nota
 *
 * @property Notas $notasIdNota
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notas_id_nota'], 'required'],
            [['notas_id_nota'], 'integer'],
            [['tag'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tag' => 'Id Tag',
            'tag' => 'Tag',
            'notas_id_nota' => 'Notas Id Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotasIdNota()
    {
        return $this->hasOne(Notas::className(), ['id_nota' => 'notas_id_nota']);
    }
    
    public static function getTagsByNota($key=null){
        if ($key !== null) {
            return self::find()
                        ->where('notas_id_nota = :notas_id_nota', [':notas_id_nota' => $key])
                        ->all(); }
    }
    
    public static function getTags()
    {
        $sql = 'SELECT DISTINCT tag FROM tags Limit 20';
	return self::findBySql($sql)->all();  
    }
}
