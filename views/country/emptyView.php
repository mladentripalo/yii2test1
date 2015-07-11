<?php
/**
 * Created by PhpStorm.
 * User: Kiz
 * Date: 9.7.2015.
 * Time: 9:44
 */

    use \app\models\Country;
    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    ___kiz_pre_code_start();

    //$query = Country::find()->joinWith('continent');

    /** @var Country $res */
    $res = Country::findOne('HR');


    echo kiz_yii_varDump($res);
    echo kiz_yii_varDump($res->continent_name);

    echo ___kiz_pre_code_end();

?>

<?= 'this is an empty view!' ?>