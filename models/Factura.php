<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property int $fac_id Id
 * @property float $fac_descuento Descuento
 * @property float $fac_iva IVA
 * @property float $fac_total Total
 * @property string $fac_emision Emisión
 * @property int $fac_fkpago Pago
 *
 * @property Pago $facFkpago
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fac_descuento', 'fac_iva', 'fac_total', 'fac_emision', 'fac_fkpago'], 'required'],
            [['fac_descuento', 'fac_iva', 'fac_total'], 'number'],
            [['fac_emision'], 'safe'],
            [['fac_fkpago'], 'integer'],
            [['fac_fkpago'], 'exist', 'skipOnError' => true, 'targetClass' => Pago::className(), 'targetAttribute' => ['fac_fkpago' => 'pag_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fac_id' => 'Id',
            'fac_descuento' => 'Descuento',
            'fac_iva' => 'IVA',
            'fac_total' => 'Total',
            'fac_emision' => 'Emisión',
            'fac_fkpago' => 'Pago',
        ];
    }

    /**
     * Gets query for [[FacFkpago]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacFkpago()
    {
        return $this->hasOne(Pago::className(), ['pag_id' => 'fac_fkpago']);
    }
}
