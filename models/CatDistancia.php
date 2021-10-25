<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_distancia".
 *
 * @property int $dis_id ID
 * @property float $dis_distancia Distancia
 * @property int $dis_fkalojamiento Alojamiento
 * @property int $dis_fkaeropuerto Aeropuerto
 *
 * @property CatAeropuerto $disFkaeropuerto
 * @property Alojamiento $disFkalojamiento
 */
class CatDistancia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_distancia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dis_distancia', 'dis_fkalojamiento', 'dis_fkaeropuerto'], 'required'],
            [['dis_distancia'], 'number'],
            [['dis_fkalojamiento', 'dis_fkaeropuerto'], 'integer'],
            [['dis_fkalojamiento'], 'exist', 'skipOnError' => true, 'targetClass' => Alojamiento::className(), 'targetAttribute' => ['dis_fkalojamiento' => 'alo_id']],
            [['dis_fkaeropuerto'], 'exist', 'skipOnError' => true, 'targetClass' => CatAeropuerto::className(), 'targetAttribute' => ['dis_fkaeropuerto' => 'aero_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => 'ID',
            'dis_distancia' => 'Distancia',
            'dis_fkalojamiento' => 'Alojamiento',
            'dis_fkaeropuerto' => 'Aeropuerto',
        ];
    }

    /**
     * Gets query for [[DisFkaeropuerto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisFkaeropuerto()
    {
        return $this->hasOne(CatAeropuerto::className(), ['aero_id' => 'dis_fkaeropuerto']);
    }

    /**
     * Gets query for [[DisFkalojamiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisFkalojamiento()
    {
        return $this->hasOne(Alojamiento::className(), ['alo_id' => 'dis_fkalojamiento']);
    }
}
