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
    public $tipoVuelo;
    public $destinoVuelo;
    public $origenVuelo;
    public $numeroHabitacion;
    public $nombreSeguro;
    public $precioTraslado;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paq_id', 'paq_descuento', 'paq_fkvuelo', 'paq_fkalojamiento', 'paq_fkseguro', 'paq_fktraslado', 'numeroHabitacion', 'precioTraslado'], 'integer'],
            [['paq_nombre', 'paq_url', 'tipoVuelo', 'destinoVuelo', 'origenVuelo', 'nombre', 'nombreSeguro', 'paq_descripcion'], 'safe'],
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
        $query->joinWith('paqFkseguro');
        $query->joinWith('paqFkvuelo');
        $query->joinWith('paqFkalojamiento');
        $query->joinWith('paqFktraslado');
        $query->joinWith(['paqFkvuelo.vueFkaerodestino']);
        $query->joinWith(['paqFkvuelo.vueFkaeroorigen']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'paq_id',
                'paq_nombre',
                'paq_descripcion',
                'paq_descuento',
                'paq_subtotal',
                'paq_url',
                'nombreSeguro' => [
                    'asc' => ['seg_nombre' => SORT_ASC],
                    'desc' => ['seg_nombre' => SORT_DESC],
                    'default' => ['seg_nombre' => SORT_ASC]
                ],
                'tipoVuelo' => [
                    'asc' => ['vue_tipo' => SORT_ASC],
                    'desc' => ['vue_tipo' => SORT_DESC],
                    'default' => ['vue_tipo' => SORT_ASC]
                ],
                'numeroHabitacion' => [
                    'asc' => ['alo_habitacion' => SORT_ASC],
                    'desc' => ['alo_habitacion' => SORT_DESC],
                    'default' => ['alo_habitacion' => SORT_ASC]
                ],
                'precioTraslado' => [
                    'asc' => ['tra_precio' => SORT_ASC],
                    'desc' => ['tra_precio' => SORT_DESC],
                    'default' => ['tra_precio' => SORT_ASC]
                ],
                'destinoVuelo' => [
                    'asc' => ['aero_nombre' => SORT_ASC],
                    'desc' => ['aero_nombre' => SORT_DESC],
                    'default' => ['aero_nombre' => SORT_ASC]
                ],
                'origenVuelo' => [
                    'asc' => ['aero_nombre' => SORT_ASC],
                    'desc' => ['aero_nombre' => SORT_DESC],
                    'default' => ['aero_nombre' => SORT_ASC]
                ],
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
            'paq_id' => $this->paq_id,
            'paq_descuento' => $this->paq_descuento,
            'paq_subtotal' => $this->paq_subtotal,
            'paq_fkvuelo' => $this->paq_fkvuelo,
            'paq_fkalojamiento' => $this->paq_fkalojamiento,
            'paq_fkseguro' => $this->paq_fkseguro,
            'paq_fktraslado' => $this->paq_fktraslado,
            'alo_habitacion' => $this->numeroHabitacion,
        ]);

        $query->andFilterWhere(['like', 'paq_nombre', $this->paq_nombre])
            ->andFilterWhere(['like', 'paq_descripcion', $this->paq_descripcion])
            ->andFilterWhere(['like', 'paq_url', $this->paq_url])
            ->andFilterWhere(['like', 'vue_tipo', $this->tipoVuelo])
            ->andFilterWhere(['like', 'aero_nombre', $this->destinoVuelo])
            ->andFilterWhere(['like', 'aero_nombre', $this->origenVuelo])
            ->andFilterWhere(['like', 'seg_nombre', $this->nombreSeguro])
            ->andFilterWhere(['like', 'tra_precio', $this->precioTraslado]);

        return $dataProvider;
    }
}
