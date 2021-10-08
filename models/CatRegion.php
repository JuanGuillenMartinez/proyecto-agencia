<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

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
    public $img;
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
            [['img', 'reg_url'], 'safe'],
            [['img'], 'file', 'extensions'      => 'jpg, png' ],
            [['img'], 'file', 'maxSize'         => '1000000'],
            [['reg_region'], 'required'],
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
            'img' => 'Imagen de la región'
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
    
    //Devuelve la ruta de la imagen en el servidor
    public function getImagen() {
        return Html::img($this->url, ['width' => '160', 'height' => '120']);
    }
    public function getUrl() {
        return "/img/" . (empty($this->reg_url) ? 'reg_default.png' : "region/{$this->reg_url}");
    }
}
