<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatSeguro;

/**
 * CatSeguroSearch represents the model behind the search form of `app\models\CatSeguro`.
 */
class CatSeguroSearch extends CatSeguro
{
    public $nombreRegion;
    public $nombreAseguradora;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seg_id', 'seg_fkregion', 'seg_fkaseguradora'], 'integer'],
            [['seg_nombre', 'nombreRegion', 'nombreAseguradora'], 'safe'],
            [['seg_precio'], 'number'],
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
        $query = CatSeguro::find();

        // add conditions that should always apply here
        $query->joinWith(['segFkregion', 'segFkaseguradora']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'seg_id',
                'seg_precio',
                'seg_nombre',
                'nombreRegion' => [
                    'asc' => ['reg_region' => SORT_ASC],
                    'desc' => ['reg_region' => SORT_DESC],
                    'default' => ['reg_region' => SORT_ASC]
                ],
                'nombreAseguradora' => [
                    'asc' => ['ase_nombre' => SORT_ASC],
                    'desc' => ['ase_nombre' => SORT_DESC],
                    'default' => ['ase_nombre' => SORT_ASC]
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
            'seg_id' => $this->seg_id,
            'seg_precio' => $this->seg_precio,
            'seg_fkregion' => $this->seg_fkregion,
            'seg_fkaseguradora' => $this->seg_fkaseguradora,
        ]);

        $query->andFilterWhere(['like', 'seg_nombre', $this->seg_nombre])
            ->andFilterWhere(['like', 'reg_region', $this->nombreRegion])
            ->andFilterWhere(['like', 'ase_nombre', $this->nombreAseguradora]);

        return $dataProvider;
    }
}
