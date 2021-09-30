<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatSucursal;

/**
 * CatSucursalSearch represents the model behind the search form of `app\models\CatSucursal`.
 */
class CatSucursalSearch extends CatSucursal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suc_id'], 'integer'],
            [['suc_nombre', 'suc_direccion', 'suc_correo', 'suc_telefono'], 'safe'],
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
        $query = CatSucursal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'suc_id' => [
                    'asc' => ['suc_id' => SORT_ASC],
                    'desc' => ['suc_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'suc_nombre',
                'suc_direccion',
                'suc_correo',
                'suc_telefono',
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
            'suc_id' => $this->suc_id,
        ]);

        $query->andFilterWhere(['like', 'suc_nombre', $this->suc_nombre])
            ->andFilterWhere(['like', 'suc_direccion', $this->suc_direccion])
            ->andFilterWhere(['like', 'suc_correo', $this->suc_correo])
            ->andFilterWhere(['like', 'suc_telefono', $this->suc_telefono]);

        return $dataProvider;
    }
}
