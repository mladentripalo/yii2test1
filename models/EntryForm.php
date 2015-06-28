<?php

    namespace app\models;

    use Yii;
    use yii\base\Model;

    class EntryForm extends Model {

        public $yourName;
        public $yourEmail;


        public function rules(){

            return [
                [['yourName','yourEmail'], 'required'],
                ['yourEmail','email']
            ];
        }
    }

?>
