<?php

    namespace app\models;
    use yii\db\ActiveRecord;

    /**
     *
     * @property string $name
     * @property int $population
     * @property string $code
     * @property string $kontinent
     */
    class Drzava extends ActiveRecord {

        // overloaded
        public static function tableName() { return 'country'; }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['code', 'name'], 'required'],
                [['population'], 'integer'],
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
                'code' => 'Kod',
                'name' => 'Ime',
                'population' => 'Stanovnika',
                'kontinent' => 'Kuntinent'
            ];
        }

        /**
         * @return string
         */
        public function getKontinent()
        {
            /** @var $rel Kontinent */
            $rel = $this->hasOne(
                Kontinent::className(),
                ['continent_id' => 'continent_id'])
                ->one();

            return $rel->name;
        }
    }




