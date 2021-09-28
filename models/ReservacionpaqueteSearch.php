<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservacionpaquete;

/**
 * ReservacionpaqueteSearch represents the model behind the search form of `app\models\Reservacionpaquete`.
 */
class ReservacionpaqueteSearch extends Reservacionpaquete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recpaq_id', 'recpaq_fkreservacion', 'recpaq_fkpaquete'], 'integer'],
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
        $query = Reservacionpaquete::find();

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
            'recpaq_id' => $this->recpaq_id,
            'recpaq_fkreservacion' => $this->recpaq_fkreservacion,
            'recpaq_fkpaquete' => $this->recpaq_fkpaquete,
        ]);

        return $dataProvider;
    }
}
