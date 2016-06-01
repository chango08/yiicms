<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frases".
 *
 * @property integer $id_frase
 * @property string $frase
 * @property string $autor
 * @property integer $estado
 */
class Frases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frase', 'autor', 'estado'], 'required'],
            [['frase'], 'string'],
            [['estado'], 'integer'],
            [['autor'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_frase' => 'Id Frase',
            'frase' => 'Frase',
            'autor' => 'Autor',
            'estado' => 'Estado',
        ];
    }
}
