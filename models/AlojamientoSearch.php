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
    public $capitalNombre;
    public $nombrePais;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alo_id', 'alo_habitacion', 'alo_fkubucacion'], 'integer'],
            [['alo_nombre', 'alo_direccion', 'alo_url', 'capitalNombre', 'nombrePais'], 'safe'],
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
        $query->joinWith('aloFkubucacion');
        $query->joinWith('aloFkubucacion.ubiFkpais');   

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' =>[
                'alo_id',
                'alo_nombre', 
                'alo_habitacion',
                'alo_direccion',
                'alo_precio',
                'alo_url',
                'capitalNombre'=>[
                    'asc' => ['ubi_capital' => SORT_ASC],
                    'desc' => ['ubi_capital' => SORT_DESC],
                    'default' => SORT_ASC,

                ],
                'nombrePais' =>[
                    'asc' => ['pai_pais' => SORT_ASC],
                    'desc' => ['pai_pais' => SORT_DESC],
                    'default' => SORT_ASC,

                ]

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
            'alo_id' => $this->alo_id,
            'alo_habitacion' => $this->alo_habitacion,
            'alo_precio' => $this->alo_precio,
            'alo_fkubucacion' => $this->alo_fkubucacion,
        ]);

        $query->andFilterWhere(['like', 'alo_nombre', $this->alo_nombre])
            ->andFilterWhere(['like', 'alo_direccion', $this->alo_direccion])
            ->andFilterWhere(['like', 'alo_url', $this->alo_url])
            ->andFilterWhere(['like', 'ubi_capital', $this->capitalNombre])
            ->andFilterWhere(['like', 'pai_pais', $this->nombrePais]);;

        return $dataProvider;
    }
}
