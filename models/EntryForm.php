<?php

    namespace app\models;

    use Yii;
    use yii\base\Model;

    class EntryForm extends Model {

        public $efName;
        public $efEmail;


        public function rules(){

            return [
                [['efName','efEmail'], 'required'],
                ['efEmail','email']
            ];
        }
    }

?>
