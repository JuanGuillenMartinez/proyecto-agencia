<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservacion;

/**
 * ReservacionSearch represents the model behind the search form of `app\models\Reservacion`.
 */
class ReservacionSearch extends Reservacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['res_id', 'res_fkpersona'], 'integer'],
            [['res_creacion', 'res_estatus'], 'safe'],
            [['res_subtotal'], 'number'],
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
        $query = Reservacion::find();

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
            'res_id' => $this->res_id,
            'res_creacion' => $this->res_creacion,
            'res_subtotal' => $this->res_subtotal,
            'res_fkpersona' => $this->res_fkpersona,
        ]);

        $query->andFilterWhere(['like', 'res_estatus', $this->res_estatus]);

        return $dataProvider;
    }
}
