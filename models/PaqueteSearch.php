<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paquete;

/**
 * PaqueteSearch represents the model behind the search form of `app\models\Paquete`.
 */
class PaqueteSearch extends Paquete
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paq_id', 'paq_fkvuelo', 'paq_fkalojamiento', 'paq_fkseguro', 'paq_fktraslado'], 'integer'],
            [['paq_nombre', 'paq_url'], 'safe'],
            [['paq_subtotal'], 'number'],
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
        $query = Paquete::find();

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
            'paq_id' => $this->paq_id,
            'paq_subtotal' => $this->paq_subtotal,
            'paq_fkvuelo' => $this->paq_fkvuelo,
            'paq_fkalojamiento' => $this->paq_fkalojamiento,
            'paq_fkseguro' => $this->paq_fkseguro,
            'paq_fktraslado' => $this->paq_fktraslado,
        ]);

        $query->andFilterWhere(['like', 'paq_nombre', $this->paq_nombre])
            ->andFilterWhere(['like', 'paq_url', $this->paq_url]);

        return $dataProvider;
    }
}
