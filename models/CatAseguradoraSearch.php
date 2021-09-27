<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatAseguradora;

/**
 * CatAseguradoraSearch represents the model behind the search form of `app\models\CatAseguradora`.
 */
class CatAseguradoraSearch extends CatAseguradora
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ase_id', 'ase_telefono'], 'integer'],
            [['ase_nombre', 'ase_correo'], 'safe'],
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
        $query = CatAseguradora::find();

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
            'ase_id' => $this->ase_id,
            'ase_telefono' => $this->ase_telefono,
        ]);

        $query->andFilterWhere(['like', 'ase_nombre', $this->ase_nombre])
            ->andFilterWhere(['like', 'ase_correo', $this->ase_correo]);

        return $dataProvider;
    }
}
