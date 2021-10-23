<?php

namespace app\models;

use Yii;
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
            [['aer_nombre', 'aer_tipo', 'aer_pagina'], 'required'],
            [['aer_tipo'], 'string'],
            [['aer_nombre'], 'string', 'max' => 45],
            [['aer_pagina'], 'string', 'max' => 55],
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

    
    
    

    
}
