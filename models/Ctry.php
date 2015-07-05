<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property string $population
 * @property string $continent_id
 *
 * @property Continent $continent
 */
class Ctry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['population', 'continent_id'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'population' => 'Population',
            'continent_id' => 'Continent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContinent()
    {
        return $this->hasOne(Continent::className(), ['continent_id' => 'continent_id']);
    }

    /**
     * @inheritdoc
     * @return CtryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CtryQuery(get_called_class());
    }
}
