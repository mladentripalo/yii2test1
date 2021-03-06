<?php

namespace app\models;

use tests\codeception\_pages\AboutPage;
use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property int $population
 * @property int $continent_id
 *
 * @property string $continent_name
 * @property Continent $continent
 */
class Country extends \yii\db\ActiveRecord
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
            'code' => 'Country code',
            'name' => 'Country name',
            'population' => 'Population',
            'continent_id' => 'Continent ID',
            'continent_name' => 'Continent',
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getContinent() {
        return $this->hasOne(Continent::className(), ['continent_id' => 'continent_id']);
    }

    /** @return string */
    public function getContinent_name(){
        return ($cont=$this->getContinent()->one()) ? $cont->name :
            (YII_DEBUG ? 'error country->getContinent_name()' : '');
    }

}
