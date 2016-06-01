<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\notas;

/**
 * modelsNotasSearch represents the model behind the search form about `app\models\notas`.
 */
class NotasSearch extends notas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nota', 'visitas', 'me_gusta', 'destacado', 'remarcado', 'estado', 'user_id'], 'integer'],
            [['titulo', 'texto', 'fecha', 'adjuntos', 'videos', 'imagen', 'categorias_id_categoria'], 'safe'],
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
        $query = notas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('categoriasIdCategoria');

        $query->andFilterWhere([
            'id_nota' => $this->id_nota,
            'fecha' => $this->fecha,
            'visitas' => $this->visitas,
            'me_gusta' => $this->me_gusta,
            'destacado' => $this->destacado,
            'remarcado' => $this->remarcado,
            'estado' => $this->estado,
            'user_id' => $this->user_id,
            'categorias_id_categoria' => $this->categorias_id_categoria,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'adjuntos', $this->adjuntos])
            ->andFilterWhere(['like', 'videos', $this->videos])
            ->andFilterWhere(['like', 'imagen', $this->imagen]);
        
        $query->orderBy(['id_nota' => SORT_DESC]);

        return $dataProvider;
    }
}
