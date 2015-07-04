<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "continent".
     *
     * @property string $continent_id
     * @property string $name
     * @property ActiveRecord [] $drzave
     *
     */
    class Kontinent extends ActiveRecord
    {
        /**
         * @inheritdoc
         */
        public static function tableName() { return 'continent';  }

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
                'continent_id' => 'continent_id',
                'name' => 'Kontinent',
            ];
        }

        public function getDrzave()
        {
            return $this->hasMany(
                Drzava::className(),
                ['continent_id' => 'continent_id']);
        }
    }