<?php

namespace app\models;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "paquete".
 *
 * @property int $paq_id Id
 * @property string $paq_nombre Nombre
 * @property float $paq_subtotal Subtotal
 * @property string $paq_url Imagen
 * @property int $paq_fkvuelo Vuelo
 * @property int $paq_fkalojamiento Alojamiento
 * @property int $paq_fkseguro Seguro
 * @property int $paq_fktraslado Traslado
 *
 * @property Alojamiento $paqFkalojamiento
 * @property CatSeguro $paqFkseguro
 * @property Traslado $paqFktraslado
 * @property Vuelo $paqFkvuelo
 * @property Reservacionpaquete[] $reservacionpaquetes
 */
class Paquete extends \yii\db\ActiveRecord
{
    
    public $img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paquete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'paq_url', 'paq_descripcion'], 'safe'],
            [['paq_nombre', 'paq_url', 'paq_fkvuelo', 'paq_fkalojamiento', 'paq_fkseguro', 'paq_fktraslado', 'paq_subtotal'], 'required'],
            [['img'], 'file', 'extensions'      => 'jpg, png'],
            [['img'], 'file', 'maxSize'         => '1000000'],
            [['paq_subtotal', 'paq_descuento'], 'number'],
            [['paq_fkvuelo', 'paq_fkalojamiento', 'paq_fkseguro', 'paq_fktraslado'], 'integer'],
            [['paq_nombre'], 'string', 'max' => 45],
            [['paq_url'], 'string', 'max' => 100],
            [['paq_fkalojamiento'], 'exist', 'skipOnError' => true, 'targetClass' => Alojamiento::className(), 'targetAttribute' => ['paq_fkalojamiento' => 'alo_id']],
            [['paq_fkseguro'], 'exist', 'skipOnError' => true, 'targetClass' => CatSeguro::className(), 'targetAttribute' => ['paq_fkseguro' => 'seg_id']],
            [['paq_fkvuelo'], 'exist', 'skipOnError' => true, 'targetClass' => Vuelo::className(), 'targetAttribute' => ['paq_fkvuelo' => 'vue_id']],
            [['paq_fktraslado'], 'exist', 'skipOnError' => true, 'targetClass' => Traslado::className(), 'targetAttribute' => ['paq_fktraslado' => 'tra_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paq_id' => 'Id',
            'paq_nombre' => 'Nombre',
            'paq_descripcion' => 'Descripción',
            'paq_descuento' => 'Descuento',
            'paq_subtotal' => 'Subtotal',
            'paq_url' => 'Imagen',
            'paq_fkvuelo' => 'Vuelo',
            'infoVuelo' => 'Vuelo',
            'tipoVuelo' => 'Tipo de Vuelo',
            'destinoVuelo' => 'Destino',
            'origenVuelo' => 'Origen',
            'numeroHabitacion' => '# Habitacion',
            'nombreSeguro' => 'Seguro',
            'precioTraslado' => 'Precio traslado',
            'paq_fkalojamiento' => 'Alojamiento',
            'paq_fkseguro' => 'Seguro',
            'paq_fktraslado' => 'Traslado',
            'img' => 'Imagen del paquete'
        ];
    }

    /**
     * Gets query for [[PaqFkalojamiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaqFkalojamiento()
    {
        return $this->hasOne(Alojamiento::className(), ['alo_id' => 'paq_fkalojamiento']);
    }

    /**
     * Gets query for [[PaqFkseguro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaqFkseguro()
    {
        return $this->hasOne(CatSeguro::className(), ['seg_id' => 'paq_fkseguro']);
    }

    /**
     * Gets query for [[PaqFktraslado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaqFktraslado()
    {
        return $this->hasOne(Traslado::className(), ['tra_id' => 'paq_fktraslado']);
    }

    /**
     * Gets query for [[PaqFkvuelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaqFkvuelo()
    {
        return $this->hasOne(Vuelo::className(), ['vue_id' => 'paq_fkvuelo']);
    }

    /**
     * Gets query for [[Reservacionpaquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservacionpaquetes()
    {
        return $this->hasMany(Reservacionpaquete::className(), ['recpaq_fkpaquete' => 'paq_id']);
    }

    public function getTipoVuelo()
    {
        return $this->paqFkvuelo->vue_tipo;
    }

    public function getDestinoVuelo()
    {
        return $this->paqFkvuelo->vueFkaerodestino->aero_nombre;
    }

    public function getOrigenVuelo()
    {
        return $this->paqFkvuelo->vueFkaeroorigen->aero_nombre;
    }

    public function getNumeroHabitacion()
    {
        return $this->paqFkalojamiento->alo_habitacion;
    }

    public function getNombreSeguro()
    {
        return $this->paqFkseguro->seg_nombre;
    }

    public function getPrecioTraslado()
    {
        return $this->paqFktraslado->tra_precio;
    }

    public function getInfoVuelo() {
        return $this->paqFkvuelo->vue_tipo . ": " . $this->getOrigenVuelo() . " - " . $this->getDestinoVuelo();
    }

    public static function getVuelosMap()
    {
        return ArrayHelper::map(Vuelo::find()->all(), 'vue_id', 'vueloInfo');
    }

    public static function getAlojamientosMap()
    {
        return ArrayHelper::map(Alojamiento::find()->all(), 'alo_id', 'alojamientoInfo');
    }

    public static function getSegurosMap()
    {
        return ArrayHelper::map(CatSeguro::find()->all(), 'seg_id', 'seguroInfo');
    }

    public static function getTrasladosMap()
    {
        return ArrayHelper::map(Traslado::find()->all(), 'tra_id', 'tra_precio');
    }
    public function getUrl()
    {
        return "/img/" . (empty($this->paq_url) ? 'reg_default.png' : "paquete/{$this->paq_url}");
    }
    public function getImagen()
    {
        return Html::img($this->url, ['width' => '160', 'height' => '120']);
    }
    public function getPrecioDescontado() {
        return ($this->paq_subtotal * $this->paq_descuento)/100.0;
    }
    public function getPrecioDescuento() {
        return $this->paq_subtotal - $this->getPrecioDescontado();
    }
    public function getFormatedSubtotal() {
        return "$" . number_format($this->paq_subtotal, 2,'.', ',');
    }
    public function getFormatedPrecioDescuento() {
        return "$" . number_format($this->getPrecioDescuento(), 2,'.', ',');
    }
    public static function alojamiento($vueloId)
    {
        $out = [];
        $vuelo = Vuelo::findOne(['vue_id' => $vueloId]);
        if (isset($vuelo)) {
            $alojamientos = Alojamiento::find()->where(['alo_fkubucacion' => $vuelo->vueFkaerodestino->aero_fkubicacion])->all();
            foreach ($alojamientos as $alojamiento) {
                $out[] = ['id' => $alojamiento->alo_id, 'name' => $alojamiento->alo_nombre];
            }
        }
        return $out;
    }

    public static function traslado($alojamientoId)
    {
        $out = [];
        $alojamiento = Alojamiento::findOne(['alo_id' => $alojamientoId]);
        if (isset($alojamiento)) {
            $traslados = Traslado::find()->where(['tra_fkubicacion' => $alojamiento->alo_fkubucacion])->all();
            foreach ($traslados as $traslado) {
                $out[] = ['id' => $traslado->tra_id, 'name' => $traslado->tra_nombre];
            }
        }
        return $out;
    }
    public function getSubtotalDescuento() {
        return $this->paq_subtotal - (($this->paq_subtotal * $this->paq_descuento) / 100);
    }

    public function getPaisOrigen() {
        return $this->paqFkvuelo->vueFkaeroorigen->aeroFkubicacion->ubiFkpais->pai_pais;
    }
    public function getPaisDestino() {
        return $this->paqFkvuelo->vueFkaerodestino->aeroFkubicacion->ubiFkpais->pai_pais;
    }
    public function getAlojamientoNombre() {
        return $this->paqFkalojamiento->alo_nombre;
    }
    public function getAerolineaNombre() {
        return $this->paqFkvuelo->vueFkaerolinea->aer_nombre;
    }
    public static function getPaquetes() {
        $paquetes = Paquete::find()->all();
        return isset($paquetes) ? $paquetes : [];
    }
    public static function getPaquetesRecientes() {
        $paquetesRecientes = Paquete::find()->orderBy(['paq_id' => SORT_DESC])->limit(4)->all();
        return isset($paquetesRecientes) ? $paquetesRecientes : [];
    }
    public static function getOfertas() {
        $paquetesOfertas = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->limit(3)->all();
        return isset($paquetesOfertas) ? $paquetesOfertas : [];
    }
    public static function getMejorOferta() {
        $paquete = Paquete::find()->orderBy(['paq_descuento' => SORT_DESC])->one();
        return isset($paquete) ? $paquete : new Paquete();
    }
}
