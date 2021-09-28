<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alojamiento;

/**
 * AlojamientoSearch represents the model behind the search form of `app\models\Alojamiento`.
 */
class AlojamientoSearch extends Alojamiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alo_id', 'alo_habitacion', 'alo_fkubucacion'], 'integer'],
            [['alo_nombre', 'alo_direccion', 'alo_url'], 'safe'],
            [['alo_precio'], 'number'],
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
        $query = Alojamiento::find();

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
            'alo_id' => $this->alo_id,
            'alo_habitacion' => $this->alo_habitacion,
            'alo_precio' => $this->alo_precio,
            'alo_fkubucacion' => $this->alo_fkubucacion,
        ]);

        $query->andFilterWhere(['like', 'alo_nombre', $this->alo_nombre])
            ->andFilterWhere(['like', 'alo_direccion', $this->alo_direccion])
            ->andFilterWhere(['like', 'alo_url', $this->alo_url]);

        return $dataProvider;
    }
}
