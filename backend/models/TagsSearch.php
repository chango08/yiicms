<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\tags;

/**
 * TagsSearch represents the model behind the search form about `app\models\tags`.
 */
class TagsSearch extends tags
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tag', 'notas_id_nota'], 'integer'],
            [['tag'], 'safe'],
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
        $query = tags::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tag' => $this->id_tag,
            'notas_id_nota' => $this->notas_id_nota,
        ]);

        $query->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
