<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $pag_id Id
 * @property string $pag_direccion Dirección de facturación
 * @property string $pag_tipo Tipo
 * @property string $pag_entidad Entidad
 * @property string $pag_tarjeta Tarjeta
 * @property string $pag_expiracion Expiración
 * @property string $pag_estatus Estatus
 * @property int $pag_fkreservacion Reservación
 *
 * @property Factura[] $facturas
 * @property Reservacion $pagFkreservacion
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pag_direccion', 'pag_tipo', 'pag_entidad', 'pag_tarjeta', 'pag_expiracion', 'pag_estatus', 'pag_fkreservacion'], 'required'],
            [['pag_tipo', 'pag_entidad', 'pag_estatus'], 'string'],
            [['pag_fkreservacion'], 'integer'],
            [['pag_direccion'], 'string', 'max' => 100],
            [['pag_tarjeta'], 'string', 'max' => 16],
            [['pag_expiracion'], 'string', 'max' => 5],
            [['pag_fkreservacion'], 'exist', 'skipOnError' => true, 'targetClass' => Reservacion::className(), 'targetAttribute' => ['pag_fkreservacion' => 'res_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pag_id' => 'Id',
            'pag_direccion' => 'Dirección de facturación',
            'pag_tipo' => 'Tipo',
            'pag_entidad' => 'Entidad',
            'pag_tarjeta' => 'Tarjeta',
            'pag_expiracion' => 'Expiración',
            'pag_estatus' => 'Estatus',
            'pag_fkreservacion' => 'Reservación', /* ? */
        ];
    }

    /**
     * Gets query for [[Facturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['fac_fkpago' => 'pag_id']);
    }

    /**
     * Gets query for [[PagFkreservacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagFkreservacion()
    {
        return $this->hasOne(Reservacion::className(), ['res_id' => 'pag_fkreservacion']);
    }
    public function getReservacion()
    {
        return $this->pagFkreservacion->res_estatus;
    }
}
