<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "traslado".
 *
 * @property int $tra_id Id
 * @property string $tra_nombre Compañia
 * @property float $tra_precio Precio por Km
 * @property int $tra_fkubicacion Ubicación
 *
 * @property Paquete[] $paquetes
 * @property CatUbicacion $traFkubicacion
 */
class Traslado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traslado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_nombre', 'tra_precio', 'tra_fkubicacion'], 'required'],
            [['tra_precio'], 'number'],
            [['tra_fkubicacion'], 'integer'],
            [['tra_nombre',], 'string', 'max' => 30],
            [['tra_fkubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => CatUbicacion::className(), 'targetAttribute' => ['tra_fkubicacion' => 'ubi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tra_id' => 'Id',
            'tra_nombre' => 'Compañia',
            'tra_precio' => 'Precio por Km',
            'tra_fkubicacion' => 'Ubicación',
            'ubicacion'=>'Ubicacion',
        ];
    }

    /**
     * Gets query for [[Paquetes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['paq_fktraslado' => 'tra_id']);
    }

    /**
     * Gets query for [[TraFkubicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraFkubicacion()
    {
        return $this->hasOne(CatUbicacion::className(), ['ubi_id' => 'tra_fkubicacion']);
    }

    public static function mapUbicacion()
    {
        return ArrayHelper::map(CatUbicacion::find()->all(),'ubi_id','ubi_capital'); 
        
    }

    public function getUbicacion()
    {
        $pais=$this->traFkubicacion->ubiFkpais->pai_pais;
        $ciudad=$this->traFkubicacion->ubi_capital;
        return $ciudad.', '.$pais;
    }
}
