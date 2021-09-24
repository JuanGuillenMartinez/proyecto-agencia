<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_aeropuerto".
 *
 * @property int $aero_id Id
 * @property string $aero_nombre Nombre
 * @property string $aero_direccion Dirección
 * @property string $aero_pagina Página
 * @property int $aero_fkubicacion Ubicación
 *
 * @property CatUbicacion $aeroFkubicacion
 * @property Vuelo[] $vuelos
 * @property Vuelo[] $vuelos0
 */
class CatAeropuerto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_aeropuerto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aero_nombre', 'aero_direccion', 'aero_pagina', 'aero_fkubicacion'], 'required'],
            [['aero_fkubicacion'], 'integer'],
            [['aero_nombre'], 'string', 'max' => 45],
            [['aero_direccion'], 'string', 'max' => 100],
            [['aero_pagina'], 'string', 'max' => 55],
            [['aero_fkubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => CatUbicacion::className(), 'targetAttribute' => ['aero_fkubicacion' => 'ubi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aero_id' => 'Id',
            'aero_nombre' => 'Nombre',
            'aero_direccion' => 'Dirección',
            'aero_pagina' => 'Página',
            'aero_fkubicacion' => 'Ubicación',
        ];
    }

    /**
     * Gets query for [[AeroFkubicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAeroFkubicacion()
    {
        return $this->hasOne(CatUbicacion::className(), ['ubi_id' => 'aero_fkubicacion']);
    }

    /**
     * Gets query for [[Vuelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVuelos()
    {
        return $this->hasMany(Vuelo::className(), ['vue_fkaeroorigen' => 'aero_id']);
    }

    /**
     * Gets query for [[Vuelos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVuelos0()
    {
        return $this->hasMany(Vuelo::className(), ['vue_fkaerodestino' => 'aero_id']);
    }
}
