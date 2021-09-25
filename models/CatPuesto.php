<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_puesto".
 *
 * @property int $pue_id Id
 * @property string $pue_puesto Puesto
 *
 * @property Empleado[] $empleados
 */
class CatPuesto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_puesto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pue_puesto'], 'required'],
            [['pue_puesto'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pue_id' => 'Id',
            'pue_puesto' => 'Puesto',
        ];
    }

    /**
     * Gets query for [[Empleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['emp_fkpuesto' => 'pue_id']);
    }
}
