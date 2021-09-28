<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_seguro".
 *
 * @property int $seg_id Id
 * @property string $seg_nombre Nombre
 * @property float $seg_precio Precio 
 * @property int $seg_fkregion Región
 * @property int $seg_fkaseguradora Aseguradora
 *
 * @property Paquete[] $paquetes
 * @property CatAseguradora $segFkaseguradora
 * @property CatRegion $segFkregion
 */
class CatSeguro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_seguro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seg_nombre', 'seg_precio', 'seg_fkregion', 'seg_fkaseguradora'], 'required'],
            [['seg_precio'], 'number'],
            [['seg_fkregion', 'seg_fkaseguradora'], 'integer'],
            [['seg_nombre'], 'string', 'max' => 45],
            [['seg_fkregion'], 'exist', 'skipOnError' => true, 'targetClass' => CatRegion::className(), 'targetAttribute' => ['seg_fkregion' => 'reg_id']],
            [['seg_fkaseguradora'], 'exist', 'skipOnError' => true, 'targetClass' => CatAseguradora::className(), 'targetAttribute' => ['seg_fkaseguradora' => 'ase_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seg_id' => 'Id',
            'seg_nombre' => 'Nombre',
            'seg_precio' => 'Precio ',
            'seg_fkregion' => 'ID de región',
            'seg_fkaseguradora' => 'ID de aseguradora',
            'nombreRegion' => 'Región',
            'nombreAseguradora' => 'Aseguradora'
        ];
    }

    /**
     * Gets query for [[Paquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['paq_fkseguro' => 'seg_id']);
    }

    /**
     * Gets query for [[SegFkaseguradora]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSegFkaseguradora()
    {
        return $this->hasOne(CatAseguradora::className(), ['ase_id' => 'seg_fkaseguradora']);
    }

    /**
     * Gets query for [[SegFkregion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSegFkregion()
    {
        return $this->hasOne(CatRegion::className(), ['reg_id' => 'seg_fkregion']);
    }

    public function getNombreRegion() {
        return $this->segFkregion->reg_region;
    }

    public function getNombreAseguradora() {
        return $this->segFkaseguradora->ase_nombre;
    }

    public static function getRegionesMap() {
        return ArrayHelper::map(CatRegion::find()->all(), 'reg_id', 'reg_region');
    }

    public static function getAseguradorasMap() {
        return ArrayHelper::map(CatAseguradora::find()->all(), 'ase_id', 'ase_nombre');
    }

    public function getSeguroInfo() {
        return $this->seg_nombre . ' - ' . $this->nombreAseguradora;
    }
}
