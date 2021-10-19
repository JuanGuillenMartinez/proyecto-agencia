<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "alojamiento".
 *
 * @property int $alo_id Id
 * @property string $alo_nombre Hotel
 * @property int $alo_habitacion Habitación
 * @property string $alo_direccion Dirección
 * @property float $alo_precio Precio
 * @property string $alo_url Imagen
 * @property int $alo_fkubucacion Ubicación
 *
 * @property CatUbicacion $aloFkubucacion
 * @property Paquete[] $paquetes
 */
class Alojamiento extends \yii\db\ActiveRecord
{

    public $img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alojamiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'alo_url'], 'safe'],
            [['img'], 'file', 'extensions'      => 'jpg, png' ],
            [['img'], 'file', 'maxSize'         => '1000000'],
            [['alo_nombre', 'alo_habitacion', 'alo_direccion', 'alo_precio', 'alo_url', 'alo_fkubucacion'], 'required'],
            [['alo_habitacion', 'alo_fkubucacion'], 'integer'],
            [['alo_precio'], 'number'],
            [['alo_nombre'], 'string', 'max' => 55],
            [['alo_direccion', 'alo_url'], 'string', 'max' => 100],
            [['alo_fkubucacion'], 'exist', 'skipOnError' => true, 'targetClass' => CatUbicacion::className(), 'targetAttribute' => ['alo_fkubucacion' => 'ubi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'alo_id' => 'Id',
            'alo_nombre' => 'Hotel',
            'alo_habitacion' => 'Habitación',
            'alo_direccion' => 'Dirección',
            'alo_precio' => 'Precio',
            'alo_url' => 'Imagen',
            'alo_fkubucacion' => 'Ubicación',
            'capitalNombre' => 'Capital',
            'nombrePais' => 'País',
            'img' => 'Imagen del Hotel'
        ];
    }

    /**
     * Gets query for [[AloFkubucacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAloFkubucacion()
    {
        return $this->hasOne(CatUbicacion::className(), ['ubi_id' => 'alo_fkubucacion']);
    }

    /**
     * Gets query for [[Paquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['paq_fkalojamiento' => 'alo_id']);
    }
    public function getCapitalNombre()
    {
        return $this->aloFkubucacion->ubi_capital;
    }
    public function getNombrePais()
    {
        return $this->aloFkubucacion->ubiFkpais->pai_pais;
    }
    public function getAlojamientoInfo()
    {
        return $this->alo_nombre . ' - Habitación #' . $this->alo_habitacion;
    }
    public function getUrl() {
        return "/img/" . (empty($this->alo_url) ? 'alo_default.png' : "alojamiento/{$this->alo_url}");
    }
    public function getImagen() {
        return Html::img($this->url, ['width' => '160', 'height' => '120']);
    }
}
