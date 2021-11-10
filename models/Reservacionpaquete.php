<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservacionpaquete".
 *
 * @property int $recpaq_id Id
 * @property int $recpaq_fkreservacion Reservación
 * @property int $recpaq_fkpaquete Paquete
 * @property string $recpaq_estatus Estatus
 * 
 * @property Paquete $recpaqFkpaquete
 * @property Reservacion $recpaqFkreservacion
 */
class Reservacionpaquete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservacionpaquete';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recpaq_fkreservacion', 'recpaq_fkpaquete'], 'required'],
            [['recpaq_fkreservacion', 'recpaq_fkpaquete'], 'integer'],
            [['recpaq_estatus'], 'safe'],
            [['recpaq_fkreservacion'], 'exist', 'skipOnError' => true, 'targetClass' => Reservacion::className(), 'targetAttribute' => ['recpaq_fkreservacion' => 'res_id']],
            [['recpaq_fkpaquete'], 'exist', 'skipOnError' => true, 'targetClass' => Paquete::className(), 'targetAttribute' => ['recpaq_fkpaquete' => 'paq_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recpaq_id' => 'Id',
            'recpaq_fkreservacion' => 'Reservación',
            'recpaq_estatus' => 'Estatus',
            'recpaq_fkpaquete' => 'Paquete',
        ];
    }

    /**
     * Gets query for [[RecpaqFkpaquete]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecpaqFkpaquete()
    {
        return $this->hasOne(Paquete::className(), ['paq_id' => 'recpaq_fkpaquete']);
    }

    /**
     * Gets query for [[RecpaqFkreservacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecpaqFkreservacion()
    {
        return $this->hasOne(Reservacion::className(), ['res_id' => 'recpaq_fkreservacion']);
    }
}
