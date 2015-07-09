<?php


    use yii\web\Application;
    use \yii\db\ActiveQuery;


    /** @noinspection PhpIncludeInspection */
    require_once \Yii::$app->basePath . '\kiz\kiz_yii.php';
?>

<script>
    $(document).ready(function () {
        $('#clk').text((new Date()).toLocaleTimeString());
        setInterval(
            function(){$('#clk').text((new Date()).toLocaleTimeString())},
            1000);
    });
</script>

<p>
    Simple JQuerry clock: <span id="clk"></span>
</p>

<h3>Example code for kiz_yii_var_inspect() function</h3>

<?php

    ___pre_code_start();
    $drz = \app\models\Country::findOne('AU');      /** @var \app\models\Country $drz ; */
    echo ___pre_code_end();
    //echo kiz_yii_var_inspect($drz);
    echo kiz_yii_varDump($drz);

    echo kiz_yii_varDump($drz->continent_name);
    echo kiz_yii_varDump($drz->attributeLabels());
    //\yii\helpers\VarDumper::dump($drz,10,true);
    echo '</br>';

    ___pre_code_start();
    $cont = $drz->getContinent()->one();
    echo ___pre_code_end();
    echo kiz_yii_varDump($cont);
    echo '</br>';
    //\yii\helpers\VarDumper::dump($cont,10,true);

    /*
    ___pre_code_start();
    $contOne = $cont->one();
    echo ___pre_code_end();
    echo kiz_yii_var_inspect($contOne);
    echo '</br>';
    */


    /*
    $dataprovider = new \yii\data\ActiveDataProvider(['query',$cont]);
    $dataprovider && kiz_yii_var_inspect($dataprovider);
    */


    echo '</br>';
    echo '</br>';

    $someText = 'This is a string.';
    print kiz_yii_varDump($someText);

    $someInteger = 375;
    print kiz_yii_varDump($someInteger);

    $someDouble = 375.44;
    print kiz_yii_varDump($someDouble);

    $someArray = ['tenk', 'boca', 'pupaja' => 'unreal'];
    print kiz_yii_varDump($someArray);

    print kiz_yii_varDump($_REQUEST);

?>



