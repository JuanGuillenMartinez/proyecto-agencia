<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_sucursal".
 *
 * @property int $suc_id Id
 * @property string $suc_nombre Nombre
 * @property string $suc_direccion Dirección
 * @property string $suc_correo Correo
 * @property string $suc_telefono Teléfono
 *
 * @property Empleado[] $empleados
 */
class CatSucursal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_sucursal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suc_nombre', 'suc_direccion', 'suc_correo', 'suc_telefono'], 'required'],
            [['suc_nombre'], 'string', 'max' => 60],
            [['suc_direccion'], 'string', 'max' => 100],
            [['suc_correo'], 'string', 'max' => 35],
            [['suc_telefono'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'suc_id' => 'Id',
            'suc_nombre' => 'Nombre',
            'suc_direccion' => 'Dirección',
            'suc_correo' => 'Correo',
            'suc_telefono' => 'Teléfono',
        ];
    }

    /**
     * Gets query for [[Empleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['emp_fksucursal' => 'suc_id']);
    }
}
