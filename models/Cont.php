<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "continent".
 *
 * @property string $continent_id
 * @property string $name
 *
 * @property Country[] $countries
 */
class Cont extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'continent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['continent_id', 'name'], 'required'],
            [['continent_id'], 'integer'],
            [['name'], 'string', 'max' => 63]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'continent_id' => 'Continent ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['continent_id' => 'continent_id']);
    }

    /**
     * @inheritdoc
     * @return ContQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContQuery(get_called_class());
    }
}
