<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "cat_aeropuerto".
 *
 * @property int $aero_id Id
 * @property string $aero_nombre Nombre
 * @property string $aero_direccion Dirección
 * @property string $aero_pagina Página
 * @property string $aero_url Imagen
 * @property int $aero_fkubicacion Ubicación
 *
 * @property CatUbicacion $aeroFkubicacion
 * @property Vuelo[] $vuelos
 * @property Vuelo[] $vuelos0
 */
class CatAeropuerto extends \yii\db\ActiveRecord
{
    public $img;
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
            [['img', 'aero_url'], 'safe'],
            [['img'], 'file', 'extensions'      => 'jpg, png' ],
            [['img'], 'file', 'maxSize'         => '1000000'],
            [['aero_nombre', 'aero_direccion', 'aero_pagina', 'aero_url', 'aero_fkubicacion'], 'required'],
            [['aero_fkubicacion'], 'integer'],
            [['aero_nombre', 'aero_direccion', 'aero_url'], 'string', 'max' => 100],
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
            'aero_url' => 'Imagen',
            'aero_fkubicacion' => 'Ubicación',
            'capitalNombre' => 'Capital',
            'nombrePais' => 'País',
            'img' => 'Imagen del Aeropuerto',
            'ubicacionInfo' => 'Ubicación'
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
    public function getCapitalNombre()
    {
        return $this->aeroFkubicacion->ubi_capital;
    }
    public function getNombrePais()
    {
        return $this->aeroFkubicacion->ubiFkpais->pai_pais;
    }
    public function getUrl() {
        return "/img/" . (empty($this->aero_url) ? 'aero_default.png' : "aeropuerto/{$this->aero_url}");
    }
    public function getImagen() {
        return Html::img($this->url, ['width' => '160', 'height' => '120']);
    }
    public function getUbicacionInfo()
    {
        return $this->aeroFkubicacion->ubi_capital . ' - ' . $this->aeroFkubicacion->ubiFkpais->pai_pais; 
    }  
}
