<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatAerolinea;

/**
 * CatAerolineaSearch represents the model behind the search form of `app\models\CatAerolinea`.
 */
class CatAerolineaSearch extends CatAerolinea
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aer_id'], 'integer'],
            [['aer_nombre', 'aer_tipo', 'aer_pagina'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CatAerolinea::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'aer_id' => $this->aer_id,
        ]);

        $query->andFilterWhere(['like', 'aer_nombre', $this->aer_nombre])
            ->andFilterWhere(['like', 'aer_tipo', $this->aer_tipo])
            ->andFilterWhere(['like', 'aer_pagina', $this->aer_pagina]);

        return $dataProvider;
    }
}
