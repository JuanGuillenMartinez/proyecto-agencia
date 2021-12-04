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
    public $paisDestino;
    public $paisOrigen;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paq_id', 'paq_descuento', 'paq_fkvuelo', 'paq_fkalojamiento', 'paq_fkseguro', 'paq_fktraslado', 'numeroHabitacion', 'precioTraslado'], 'integer'],
            [['paq_nombre', 'paq_url', 'tipoVuelo', 'destinoVuelo', 'origenVuelo', 'nombre', 'nombreSeguro', 'paq_descripcion', 'paisDestino', 'paisOrigen'], 'safe'],
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
        $query->joinWith(['paqFkseguro', 'paqFkvuelo', 'paqFkalojamiento', 'paqFktraslado', 'paqFkvuelo.vueFkaerodestino as destino', 'paqFkvuelo.vueFkaeroorigen as origen', 'paqFkvuelo.vueFkaerodestino.aeroFkubicacion as ubiDestino', 'paqFkvuelo.vueFkaeroorigen.aeroFkubicacion as ubiOrigen', 'paqFkvuelo.vueFkaerodestino.aeroFkubicacion.ubiFkpais as paisDestino', 'paqFkvuelo.vueFkaeroorigen.aeroFkubicacion.ubiFkpais as paisOrigen']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
            ]
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
                    'asc' => ['destino.aero_nombre' => SORT_ASC],
                    'desc' => ['destino.aero_nombre' => SORT_DESC],
                    'default' => ['destino.aero_nombre' => SORT_ASC]
                ],
                'origenVuelo' => [
                    'asc' => ['origen.aero_nombre' => SORT_ASC],
                    'desc' => ['origen.aero_nombre' => SORT_DESC],
                    'default' => ['origen.aero_nombre' => SORT_ASC]
                ],
                'paisDestino' => [
                    'asc' => ['destino.ubiDestino.paisDestino.pai_pais' => SORT_ASC],
                    'desc' => ['destino.ubiDestino.paisDestino.pai_pais' => SORT_DESC],
                    'default' => ['destino.ubiDestino.paisDestino.pai_pais' => SORT_ASC]
                ],
                'paisOrigen' => [
                    'asc' => ['origen.ubiOrigen.paisOrigen.pai_pais' => SORT_ASC],
                    'desc' => ['origen.ubiOrigen.paisOrigen.pai_pais' => SORT_DESC],
                    'default' => ['origen.ubiOrigen.paisOrigen.pai_pais' => SORT_ASC]
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
            ->andFilterWhere(['like', 'destino.aero_nombre', $this->destinoVuelo])
            ->andFilterWhere(['like', 'origen.aero_nombre', $this->origenVuelo])
            ->andFilterWhere(['like', 'seg_nombre', $this->nombreSeguro])
            ->andFilterWhere(['like', 'tra_precio', $this->precioTraslado])
            ->andFilterWhere(['like', 'paisOrigen.pai_pais', $this->paisOrigen])
            ->andFilterWhere(['like', 'paisDestino.pai_pais', $this->paisDestino]);

        return $dataProvider;
    }
}
