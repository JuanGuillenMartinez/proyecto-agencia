<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatPuesto;

/**
 * CatPuestoSearch represents the model behind the search form of `app\models\CatPuesto`.
 */
class CatPuestoSearch extends CatPuesto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pue_id'], 'integer'],
            [['pue_puesto'], 'safe'],
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
        $query = CatPuesto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'pue_id' => [
                    'asc' => ['pue_id' => SORT_ASC],
                    'desc' => ['pue_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'pue_puesto',
                ]
       
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pue_id' => $this->pue_id,
        ]);

        $query->andFilterWhere(['like', 'pue_puesto', $this->pue_puesto]);

        return $dataProvider;
    }
}
