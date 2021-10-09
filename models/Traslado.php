<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "traslado".
 *
 * @property int $tra_id Id
 * @property float $tra_precio Precio
 *
 * @property Paquete[] $paquetes
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
            [['tra_precio'], 'required'],
            [['tra_precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tra_id' => 'Id',
            'tra_precio' => 'Precio',
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
    public static function getPrecioTraslado($id)
    {
        /* return ArrayHelper::map((array)Traslado::find()->where(['tra_id'=>$id])->one(),'tra_id','tra_precio')[$id]; ; */
        return Traslado::find()->where(['tra_id'=>$id])->one()->tra_precio;
        /* return Traslado::find()->select(['tra_precio'])->where(['tra_id'=>$id])->one(); */
    }
    public function getPrecioOrigenDestino()
    {
        /* ??????????????????????????? */
    }
}
