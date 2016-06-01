<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Frases;

/**
 * FrasesSearch represents the model behind the search form about `app\models\Frases`.
 */
class FrasesSearch extends Frases
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_frase', 'estado'], 'integer'],
            [['frase', 'autor'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Frases::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_frase' => $this->id_frase,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'frase', $this->frase])
            ->andFilterWhere(['like', 'autor', $this->autor]);

        return $dataProvider;
    }
}
