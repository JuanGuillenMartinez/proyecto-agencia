<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_region".
 *
 * @property int $reg_id Id
 * @property string $reg_region Región
 * @property string $reg_url Imagen
 *
 * @property CatSeguro[] $catSeguros
 */
class CatRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_region', 'reg_url'], 'required'],
            [['reg_region'], 'string', 'max' => 45],
            [['reg_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Id',
            'reg_region' => 'Región',
            'reg_url' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[CatSeguros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatSeguros()
    {
        return $this->hasMany(CatSeguro::className(), ['seg_fkregion' => 'reg_id']);
    }
}
