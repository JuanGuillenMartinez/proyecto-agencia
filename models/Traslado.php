<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traslado".
 *
 * @property int $tra_id Id
 * @property float $tra_precio Precio
 *
 * @property Paquete[] $paquetes
 */
class Traslado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traslado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_precio'], 'required'],
            [['tra_precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tra_id' => 'Id',
            'tra_precio' => 'Precio',
        ];
    }

    /**
     * Gets query for [[Paquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['paq_fktraslado' => 'tra_id']);
    }
}
