<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatAeropuerto;

/**
 * CatAeropuertoSearch represents the model behind the search form of `app\models\CatAeropuerto`.
 */
class CatAeropuertoSearch extends CatAeropuerto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aero_id', 'aero_fkubicacion'], 'integer'],
            [['aero_nombre', 'aero_direccion', 'aero_pagina'], 'safe'],
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
        $query = CatAeropuerto::find();

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
            'aero_id' => $this->aero_id,
            'aero_fkubicacion' => $this->aero_fkubicacion,
        ]);

        $query->andFilterWhere(['like', 'aero_nombre', $this->aero_nombre])
            ->andFilterWhere(['like', 'aero_direccion', $this->aero_direccion])
            ->andFilterWhere(['like', 'aero_pagina', $this->aero_pagina]);

        return $dataProvider;
    }
}
