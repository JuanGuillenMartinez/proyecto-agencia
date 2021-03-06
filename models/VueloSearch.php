<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vuelo;

/**
 * VueloSearch represents the model behind the search form of `app\models\Vuelo`.
 */
class VueloSearch extends Vuelo
{
    public $aerolineaNombre;
    public $origenVuelo;
    public $destinoVuelo;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vue_id', 'vue_capacidad', 'vue_fkaerolinea', 'vue_fkaeroorigen', 'vue_fkaerodestino'], 'integer'],
            [['vue_tipo', 'vue_salida', 'vue_llegada', 'vue_fecha', 'vue_estatus', 'aerolineaNombre', 'origenVuelo', 'destinoVuelo'], 'safe'],
            [['vue_precio'], 'number'],
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
        $query = Vuelo::find();

        // add conditions that should always apply here
        $query->joinWith(['vueFkaerolinea', 'vueFkaeroorigen as ori', 'vueFkaerodestino as des']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' =>[
                'vue_id',
                'vue_tipo',
                'vue_salida',
                'vue_llegada',
                'vue_fecha',
                'vue_capacidad',
                'vue_precio',
                'vue_estatus',
                'aerolineaNombre' =>[
                    'asc' => ['aer_nombre' => SORT_ASC],
                    'desc' => ['aer_nombre' => SORT_DESC],
                    'default' => SORT_ASC,

                ],
                'origenVuelo' =>[
                    'asc' => ['ori.aero_nombre' => SORT_ASC],
                    'desc' => ['ori.aero_nombre' => SORT_DESC],
                    'default' => SORT_ASC,

                ],
                'destinoVuelo' =>[
                    'asc' => ['des.aero_nombre' => SORT_ASC],
                    'desc' => ['des.aero_nombre' => SORT_DESC],
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
            'vue_id' => $this->vue_id,
            'vue_salida' => $this->vue_salida,
            'vue_llegada' => $this->vue_llegada,
            'vue_fecha' => $this->vue_fecha,
            'vue_capacidad' => $this->vue_capacidad,
            'vue_precio' => $this->vue_precio,
            'vue_fkaerolinea' => $this->vue_fkaerolinea,
            'vue_fkaeroorigen' => $this->vue_fkaeroorigen,
            'vue_fkaerodestino' => $this->vue_fkaerodestino,
        ]);

        $query->andFilterWhere(['like', 'vue_tipo', $this->vue_tipo])
            ->andFilterWhere(['like', 'vue_estatus', $this->vue_estatus])
            ->andFilterWhere(['like', 'aer_nombre', $this->aerolineaNombre])
            ->andFilterWhere(['like', 'ori.aero_nombre', $this->origenVuelo])
            ->andFilterWhere(['like', 'des.aero_nombre', $this->destinoVuelo]);

        return $dataProvider;
    }
}
