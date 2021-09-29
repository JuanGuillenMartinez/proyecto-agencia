<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "reservacion".
 *
 * @property int $res_id Id
 * @property string $res_creacion Creación
 * @property string $res_estatus Estatus
 * @property float $res_subtotal Subtotal
 * @property int $res_fkpersona Persona
 *
 * @property Pago[] $pagos
 * @property Persona $resFkpersona
 * @property Reservacionpaquete[] $reservacionpaquetes
 */
class Reservacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['res_creacion'], 'safe'],
            [['res_estatus', 'res_subtotal', 'res_fkpersona'], 'required'],
            [['res_estatus'], 'string'],
            [['res_subtotal'], 'number'],
            [['res_fkpersona'], 'integer'],
            [['res_fkpersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['res_fkpersona' => 'per_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'res_id' => 'Id',
            'res_creacion' => 'Creación',
            'res_estatus' => 'Estatus',
            'res_subtotal' => 'Subtotal',
            'res_fkpersona' => 'Cliente',
            'clienteNombre' => 'Nombre del cliente'
        ];
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['pag_fkreservacion' => 'res_id']);
    }

    /**
     * Gets query for [[ResFkpersona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResFkpersona()
    {
        return $this->hasOne(Persona::className(), ['per_id' => 'res_fkpersona']);
    }

    /**
     * Gets query for [[Reservacionpaquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservacionpaquetes()
    {
        return $this->hasMany(Reservacionpaquete::className(), ['recpaq_fkreservacion' => 'res_id']);
    }

    public function getClienteNombre() {
        $persona = $this->resFkpersona;
        return $persona->per_nombre . ' ' . $persona->per_paterno . ' ' . $persona->per_materno; 
    }

    public static function getClientesNombresMap() {
        return ArrayHelper::map(Persona::find()->all(), 'per_id', 'nombrePersona');
    }
}
