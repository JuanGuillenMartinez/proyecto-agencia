<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $per_id Id
 * @property string $per_nombre Nombre persona
 * @property string $per_paterno Apellido paterno
 * @property string $per_materno Apellido materno
 * @property string $per_nacimiento Nacimiento
 * @property string $per_direccion Dirección
 * @property string $per_correo Correo
 * @property string $per_telefono Teléfono
 * @property string $per_url Perfil
 * @property int $per_fkuser User
 *
 * @property Empleado[] $empleados
 * @property User $perFkuser
 * @property Reservacion[] $reservacions
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_paterno', 'per_materno', 'per_nacimiento', 'per_direccion', 'per_correo', 'per_telefono', 'per_url', 'per_fkuser'], 'required'],
            [['per_nacimiento'], 'safe'],
            [['per_fkuser'], 'integer'],
            [['per_nombre', 'per_paterno', 'per_materno'], 'string', 'max' => 35],
            [['per_direccion', 'per_url'], 'string', 'max' => 100],
            [['per_correo'], 'string', 'max' => 55],
            [['per_telefono'], 'string', 'max' => 10],
            [['per_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['per_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'Id',
            'per_nombre' => 'Nombre persona',
            'per_paterno' => 'Apellido paterno',
            'per_materno' => 'Apellido materno',
            'per_nacimiento' => 'Nacimiento',
            'per_direccion' => 'Dirección',
            'per_correo' => 'Correo',
            'per_telefono' => 'Teléfono',
            'per_url' => 'Foto de perfil',
            'per_fkuser' => 'User',
        ];
    }

    /**
     * Gets query for [[Empleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['emp_fkpersona' => 'per_id']);
    }

    /**
     * Gets query for [[PerFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'per_fkuser']);
    }

    /**
     * Gets query for [[Reservacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservacions()
    {
        return $this->hasMany(Reservacion::className(), ['res_fkpersona' => 'per_id']);
    }

    public function getNombrePersona() {
        return $this->per_nombre . ' ' . $this->per_paterno . ' ' . $this->per_materno;
    }
}
