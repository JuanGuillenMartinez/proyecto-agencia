<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_aseguradora".
 *
 * @property int $ase_id Id
 * @property string $ase_nombre Nombre
 * @property int $ase_telefono Teléfono
 * @property string $ase_correo Correo
 *
 * @property CatSeguro[] $catSeguros
 */
class CatAseguradora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_aseguradora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ase_nombre', 'ase_telefono', 'ase_correo'], 'required'],
            [['ase_telefono'], 'string','max'=>12],
            [['ase_nombre'], 'string', 'max' => 50],
            [['ase_correo'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ase_id' => 'Id',
            'ase_nombre' => 'Nombre',
            'ase_telefono' => 'Teléfono',
            'ase_correo' => 'Correo',
        ];
    }

    /**
     * Gets query for [[CatSeguros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatSeguros()
    {
        return $this->hasMany(CatSeguro::className(), ['seg_fkaseguradora' => 'ase_id']);
    }
}
