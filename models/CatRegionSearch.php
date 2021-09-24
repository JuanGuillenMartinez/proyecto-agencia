<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatRegion;

/**
 * CatRegionSearch represents the model behind the search form of `app\models\CatRegion`.
 */
class CatRegionSearch extends CatRegion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_id'], 'integer'],
            [['reg_region', 'reg_url'], 'safe'],
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
        $query = CatRegion::find();

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
            'reg_id' => $this->reg_id,
        ]);

        $query->andFilterWhere(['like', 'reg_region', $this->reg_region])
            ->andFilterWhere(['like', 'reg_url', $this->reg_url]);

        return $dataProvider;
    }
}
