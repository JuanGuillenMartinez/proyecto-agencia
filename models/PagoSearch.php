<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pago;

/**
 * PagoSearch represents the model behind the search form of `app\models\Pago`.
 */
class PagoSearch extends Pago
{
    public $reservacion; //search creado
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pag_id', 'pag_fkreservacion'], 'integer'],
            [['pag_direccion', 'pag_tipo', 'pag_entidad', 'pag_tarjeta', 'pag_expiracion', 'pag_estatus', 'reservacion'], 'safe'],  //search creado
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
        $query = Pago::find();
        
        /* search personal */
        $query->joinWith('pagFkreservacion');
        
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
            'pag_id' => $this->pag_id,
            'pag_fkreservacion' => $this->pag_fkreservacion,
        ]);

        $query->andFilterWhere(['like', 'pag_direccion', $this->pag_direccion])
            ->andFilterWhere(['like', 'pag_tipo', $this->pag_tipo])
            ->andFilterWhere(['like', 'pag_entidad', $this->pag_entidad])
            ->andFilterWhere(['like', 'pag_tarjeta', $this->pag_tarjeta])
            ->andFilterWhere(['like', 'pag_expiracion', $this->pag_expiracion])
            ->andFilterWhere(['like', 'pag_estatus', $this->reservacion])  //search creado
            ->andFilterWhere(['like', 'res_estatus', $this->pag_estatus]);

        return $dataProvider;
    }
}
