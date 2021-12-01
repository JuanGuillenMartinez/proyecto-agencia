<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Traslado;

/**
 * TrasladoSearch represents the model behind the search form of `app\models\Traslado`.
 */
class TrasladoSearch extends Traslado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_id', 'tra_fkubicacion'], 'integer'],
            [['tra_nombre'], 'safe'],
            [['tra_precio'], 'number'],
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
        $query = Traslado::find();

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
            'tra_id' => $this->tra_id,
            'tra_precio' => $this->tra_precio,
            'tra_fkubicacion' => $this->tra_fkubicacion,
        ]);

        $query->andFilterWhere(['like', 'tra_nombre', $this->tra_nombre]);

        return $dataProvider;
    }
}
