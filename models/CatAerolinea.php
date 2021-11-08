<?php

namespace app\models;

use Yii;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_aerolinea".
 *
 * @property int $aer_id Id
 * @property string $aer_nombre Aerolínea
 * @property string $aer_tipo Tipo
 * @property string $aer_pagina Página
 *
 * @property Vuelo[] $vuelos
 */
class CatAerolinea extends \yii\db\ActiveRecord
{
    public $img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_aerolinea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'aer_url'], 'safe'],
            [['img'], 'file', 'extensions'      => 'jpg, png' ],
            [['img'], 'file', 'maxSize'         => '1000000'],

            [['aer_nombre', 'aer_tipo', 'aer_pagina', 'aer_url'], 'required'],
            [['aer_tipo'], 'string'],
            [['aer_nombre'], 'string', 'max' => 45],
            [['aer_pagina'], 'string', 'max' => 55],
            [['aer_url'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aer_id' => 'Id',
            'aer_nombre' => 'Aerolínea',
            'aer_tipo' => 'Tipo',
            'aer_pagina' => 'Página',
            'aer_url' => 'Imagen',
            'img' => 'Imagen de la Aerolinea', /* ????? */
        ];
    }

    /**
     * Gets query for [[Vuelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVuelos()
    {
        return $this->hasMany(Vuelo::className(), ['vue_fkaerolinea' => 'aer_id']);
    }

    public static function map(){
        return ArrayHelper::map(CatAerolinea::find()->all(),'aer_id','aer_nombre');
    }

    public function getUrl() {
        return "/img/" . (empty($this->aer_url) ? 'aer_default.png' : "aerolinea/{$this->aer_url}");
    }

    public function getImagen() {
        return Html::img($this->url, ['width' => '160', 'height' => '120']);
    }

    
    
    

    
}
