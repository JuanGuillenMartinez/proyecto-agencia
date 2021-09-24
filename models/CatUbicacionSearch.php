<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatUbicacion;

/**
 * CatUbicacionSearch represents the model behind the search form of `app\models\CatUbicacion`.
 */
class CatUbicacionSearch extends CatUbicacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ubi_id', 'ubi_fkpais'], 'integer'],
            [['ubi_capital'], 'safe'],
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
        $query = CatUbicacion::find();

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
            'ubi_id' => $this->ubi_id,
            'ubi_fkpais' => $this->ubi_fkpais,
        ]);

        $query->andFilterWhere(['like', 'ubi_capital', $this->ubi_capital]);

        return $dataProvider;
    }
}
