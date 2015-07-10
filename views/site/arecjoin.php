<?php
/**
 * Created by PhpStorm.
 * User: Kiz
 * Date: 4.7.2015.
 * Time: 11:21
 *
 *
 */

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';
    use \app\models\Country;
    use app\models\Continent;
    use \yii\db\ActiveQuery;
?>

    <p>
        Simple JQuerry clock: <span id="clk"></span>
    </p>

    <script>
        $(document).ready(function () {
            $('#clk').text((new Date()).toLocaleTimeString());
            setInterval(
                function(){$('#clk').text((new Date()).toLocaleTimeString())},
                1000);
            });
    </script>

<h3>Output:</h3>
<?php
    ___kiz_pre_code_start();
    /** @var Country $drz; */
    $drz = Country::findOne('HR');

    if($drz){

        YII_DEBUG && assert('$drz->className()==="app\models\Country"');

        echo '<pre>';
        echo "\ncode:" . $drz->code;
        echo "\nname:" . $drz->name;
        echo "\npopulation:" . $drz->population;
        echo "\ncontinent:" . $drz->continent_name;
        echo '</pre>';
    }
    else
        echo "\n\$drz Not Found!";
    $code1 = ___kiz_pre_code_end();
?>

<h3>Code:</h3>
<?= $code1 . kiz_yii_varDump($drz) ?>




