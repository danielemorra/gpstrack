<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property string $cat_id
 * @property string $cat_categoria
 * @property integer $cat_livello
 *
 * @property Componenti[] $componentis
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_categoria'], 'required'],
            [['cat_livello'], 'integer'],
            [['cat_categoria'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_categoria' => 'Cat Categoria',
            'cat_livello' => 'Cat Livello',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponentis()
    {
        return $this->hasMany(Componenti::className(), ['cmp_id_cat' => 'cat_id']);
    }
}
