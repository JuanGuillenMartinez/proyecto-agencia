<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_ubicacion".
 *
 * @property int $ubi_id Id
 * @property string $ubi_capital Capital
 * @property int $ubi_fkpais País
 *
 * @property Alojamiento[] $alojamientos
 * @property CatAeropuerto[] $catAeropuertos
 * @property CatPais $ubiFkpais
 */
class CatUbicacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_ubicacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ubi_capital', 'ubi_fkpais'], 'required'],
            [['ubi_fkpais'], 'integer'],
            [['ubi_capital'], 'string', 'max' => 120],
            [['ubi_fkpais'], 'exist', 'skipOnError' => true, 'targetClass' => CatPais::className(), 'targetAttribute' => ['ubi_fkpais' => 'pai_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ubi_id' => 'Id',
            'ubi_capital' => 'Capital',
            'ubi_fkpais' => 'País',
            'paisNombre' => 'Pais',
        ];
    }

    /**
     * Gets query for [[Alojamientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlojamientos()
    {
        return $this->hasMany(Alojamiento::className(), ['alo_fkubucacion' => 'ubi_id']);
    }

    /**
     * Gets query for [[CatAeropuertos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatAeropuertos()
    {
        return $this->hasMany(CatAeropuerto::className(), ['aero_fkubicacion' => 'ubi_id']);
    }

    /**
     * Gets query for [[UbiFkpais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUbiFkpais()
    {
        return $this->hasOne(CatPais::className(), ['pai_id' => 'ubi_fkpais']);
    }
    public function getPaisNombre()
    {
        return $this->ubiFkpais->pai_pais;
    }

    public static function map()
    {
        return ArrayHelper::map(CatUbicacion::find()->all(), 'ubi_id', 'paisCapital');
    }

    public function getPaisCapital()
    {
        return $this->ubi_capital . ' - ' . $this->paisNombre;
    }
}
