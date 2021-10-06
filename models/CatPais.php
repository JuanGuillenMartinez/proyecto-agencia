<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_pais".
 *
 * @property int $pai_id Id
 * @property string $pai_pais País
 *
 * @property CatUbicacion[] $catUbicacions
 */
class CatPais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pai_pais'], 'required'],
            [['pai_pais'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pai_id' => 'Id',
            'pai_pais' => 'País',
        ];
    }

    /**
     * Gets query for [[CatUbicacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatUbicacions()
    {
        return $this->hasMany(CatUbicacion::className(), ['ubi_fkpais' => 'pai_id']);
    }

public static function map() 
{
   return ArrayHelper::map (CatPais::find()->all(),'pai_id', 'pai_pais');
}

}
