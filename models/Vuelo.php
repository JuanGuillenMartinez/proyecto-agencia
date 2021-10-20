<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vuelo".
 *
 * @property int $vue_id Id
 * @property string $vue_tipo Tipo
 * @property string $vue_salida Salida
 * @property string $vue_llegada Llegada
 * @property string $vue_fecha Fecha límite
 * @property int $vue_capacidad Capacidad
 * @property float $vue_precio Precio
 * @property string $vue_estatus Estatus
 * @property int $vue_fkaerolinea Aerolínea
 * @property int $vue_fkaeroorigen Origen
 * @property int $vue_fkaerodestino Destino
 *
 * @property Paquete[] $paquetes
 * @property CatAeropuerto $vueFkaerodestino
 * @property CatAerolinea $vueFkaerolinea
 * @property CatAeropuerto $vueFkaeroorigen
 */
class Vuelo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vuelo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vue_tipo', 'vue_salida', 'vue_llegada', 'vue_fecha', 'vue_capacidad', 'vue_precio', 'vue_estatus', 'vue_fkaerolinea', 'vue_fkaeroorigen', 'vue_fkaerodestino'], 'required'],
            [['vue_tipo', 'vue_estatus'], 'string'],
            [['vue_salida', 'vue_llegada', 'vue_fecha'], 'safe'],
            [['vue_capacidad', 'vue_fkaerolinea', 'vue_fkaeroorigen', 'vue_fkaerodestino'], 'integer'],
            [['vue_precio'], 'number'],
            [['vue_fkaeroorigen'], 'exist', 'skipOnError' => true, 'targetClass' => CatAeropuerto::className(), 'targetAttribute' => ['vue_fkaeroorigen' => 'aero_id']],
            [['vue_fkaerodestino'], 'exist', 'skipOnError' => true, 'targetClass' => CatAeropuerto::className(), 'targetAttribute' => ['vue_fkaerodestino' => 'aero_id']],
            [['vue_fkaerolinea'], 'exist', 'skipOnError' => true, 'targetClass' => CatAerolinea::className(), 'targetAttribute' => ['vue_fkaerolinea' => 'aer_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vue_id' => 'Id',
            'vue_tipo' => 'Tipo',
            'vue_salida' => 'Salida',
            'vue_llegada' => 'Llegada',
            'vue_fecha' => 'Fecha límite',
            'vue_capacidad' => 'Capacidad',
            'vue_precio' => 'Precio',
            'vue_estatus' => 'Estatus',
            'vue_fkaerolinea' => 'Aerolínea',
            'aerolineaNombre' => 'Aerolinea',
            'vue_fkaeroorigen' => 'Origen',
            'origenVuelo' => 'Origen',
            'vue_fkaerodestino' => 'Destino',
            'destinoVuelo' => 'Destino',
            'aerolineaNombre' => 'Aerolínea',
            'vueOrigen' => 'Aeropuerto de Origen',
            'vueDestino' => 'Aeropuerto de Destino'
        ];
    }

    /**
     * Gets query for [[Paquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['paq_fkvuelo' => 'vue_id']);
    }

    /**
     * Gets query for [[VueFkaerodestino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVueFkaerodestino()
    {
        return $this->hasOne(CatAeropuerto::className(), ['aero_id' => 'vue_fkaerodestino']);
    }

    /**
     * Gets query for [[VueFkaerolinea]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVueFkaerolinea()
    {
        return $this->hasOne(CatAerolinea::className(), ['aer_id' => 'vue_fkaerolinea']);
    }

    /**
     * Gets query for [[VueFkaeroorigen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVueFkaeroorigen()
    {
        return $this->hasOne(CatAeropuerto::className(), ['aero_id' => 'vue_fkaeroorigen']);
    }
    public function getAerolineaNombre()
    {
        return $this->vueFkaerolinea->aer_nombre;
    }
    public function getOrigenVuelo()
    {
        return $this->vueFkaeroorigen->aero_nombre;
    }
    public function getDestinoVuelo()
    {
        return $this->vueFkaerodestino->aero_nombre;
    }
    public function getVueloInfo()
    {
        return $this->vue_tipo . ' - ' . $this->vueFkaeroorigen->aero_nombre . ' - ' . $this->vueFkaerodestino->aero_nombre;
    }
    public function getVueOrigen()
    {
        return $this->vueFkaeroorigen->aero_nombre;
    }
    public function getVueDestino()
    {
        return $this->vueFkaerodestino->aero_nombre;
    }
}
