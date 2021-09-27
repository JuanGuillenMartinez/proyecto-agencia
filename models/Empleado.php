<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property int $emp_id Id
 * @property int $emp_fksucursal Sucursal
 * @property int $emp_fkpersona Persona
 * @property int $emp_fkpuesto Puesto
 *
 * @property Persona $empFkpersona
 * @property CatPuesto $empFkpuesto
 * @property CatSucursal $empFksucursal
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_fksucursal', 'emp_fkpersona', 'emp_fkpuesto'], 'required'],
            [['emp_fksucursal', 'emp_fkpersona', 'emp_fkpuesto'], 'integer'],
            [['emp_fkpersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['emp_fkpersona' => 'per_id']],
            [['emp_fkpuesto'], 'exist', 'skipOnError' => true, 'targetClass' => CatPuesto::className(), 'targetAttribute' => ['emp_fkpuesto' => 'pue_id']],
            [['emp_fksucursal'], 'exist', 'skipOnError' => true, 'targetClass' => CatSucursal::className(), 'targetAttribute' => ['emp_fksucursal' => 'suc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Id',
            'emp_fksucursal' => 'Sucursal',
            'emp_fkpersona' => 'Persona',
            'emp_fkpuesto' => 'Puesto',
        ];
    }

    /**
     * Gets query for [[EmpFkpersona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpFkpersona()
    {
        return $this->hasOne(Persona::className(), ['per_id' => 'emp_fkpersona']);
    }

    /**
     * Gets query for [[EmpFkpuesto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpFkpuesto()
    {
        return $this->hasOne(CatPuesto::className(), ['pue_id' => 'emp_fkpuesto']);
    }

    /**
     * Gets query for [[EmpFksucursal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpFksucursal()
    {
        return $this->hasOne(CatSucursal::className(), ['suc_id' => 'emp_fksucursal']);
    }
}
