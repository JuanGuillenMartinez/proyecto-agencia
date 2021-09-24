<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_aerolinea".
 *
 * @property int $aer_id Id
 * @property string $aer_nombre Aerolínea
 *
 * @property Vuelo[] $vuelos
 */
class CatAerolinea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_aerolinea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aer_nombre'], 'required'],
            [['aer_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aer_id' => 'Id',
            'aer_nombre' => 'Aerolínea',
        ];
    }

    /**
     * Gets query for [[Vuelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVuelos()
    {
        return $this->hasMany(Vuelo::className(), ['vue_fkaerolinea' => 'aer_id']);
    }
}
