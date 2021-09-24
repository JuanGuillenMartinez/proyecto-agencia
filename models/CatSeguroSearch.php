<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatSeguro;

/**
 * CatSeguroSearch represents the model behind the search form of `app\models\CatSeguro`.
 */
class CatSeguroSearch extends CatSeguro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seg_id', 'seg_fkregion', 'seg_fkaseguradora'], 'integer'],
            [['seg_nombre'], 'safe'],
            [['seg_precio'], 'number'],
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
        $query = CatSeguro::find();

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
            'seg_id' => $this->seg_id,
            'seg_precio' => $this->seg_precio,
            'seg_fkregion' => $this->seg_fkregion,
            'seg_fkaseguradora' => $this->seg_fkaseguradora,
        ]);

        $query->andFilterWhere(['like', 'seg_nombre', $this->seg_nombre]);

        return $dataProvider;
    }
}
