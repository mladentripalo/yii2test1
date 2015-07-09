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

<h3>Example code for kiz_yii_varInspect() and/or kiz_yii_varDump() functions</h3>
<h4>Also shows usage of ___pre_code_start() and ___pre_code_end() which display actually running part of code on screen.</h4>

<?php


    ___kiz_pre_code_start();
    $drz = \app\models\Country::findOne('AU');      /** @var \app\models\Country $drz ; */
    echo ___kiz_pre_code_end();

    //echo kiz_yii_varInspect($drz);
    echo kiz_yii_varDump($drz);
    echo kiz_yii_varInspect($drz);
    echo kiz_yii_varDump($drz->continent_name);
    echo kiz_yii_varInspect($drz->continent_name);
    echo kiz_yii_varDump($drz->attributeLabels());
    echo kiz_yii_varInspect($drz->attributeLabels());
    //\yii\helpers\VarDumper::dump($drz,10,true);
    echo '</br>';

    ___kiz_pre_code_start();
    $cont = $drz->getContinent()->one();
    echo ___kiz_pre_code_end();
    echo kiz_yii_varDump($cont);
    echo '</br>';
    //\yii\helpers\VarDumper::dump($cont,10,true);

    /*
    ___kiz_pre_code_start();
    $contOne = $cont->one();
    echo ___kiz_pre_code_end();
    echo kiz_yii_varInspect($contOne);
    echo '</br>';
    */


    /*
    $dataprovider = new \yii\data\ActiveDataProvider(['query',$cont]);
    $dataprovider && kiz_yii_varInspect($dataprovider);
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



