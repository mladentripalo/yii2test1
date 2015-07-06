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
    $drz = \app\models\Country::findOne('HR');      /** @var \app\models\Country $drz ; */
    echo ___pre_code_end();
    echo kiz_yii_var_inspect($drz);
    echo '</br>';

    ___pre_code_start();
    $cont = $drz->getContinent();
    echo ___pre_code_end();
    echo kiz_yii_var_inspect($cont);
    echo '</br>';

    //$cont->joinWith('continent');

    $contOne = $cont->one();
    $contOne && print kiz_yii_var_inspect($contOne);


    /*
    $dataprovider = new \yii\data\ActiveDataProvider(['query',$cont]);
    $dataprovider && kiz_yii_var_inspect($dataprovider);
    */


    echo '</br>';
    echo '</br>';


    $someText = 'This is a string.';
    print kiz_yii_var_inspect($someText);

    $someInteger = 375;
    print kiz_yii_var_inspect($someInteger);

    $someDouble = 375.44;
    print kiz_yii_var_inspect($someDouble);

    $someArray = ['tenk', 'boca', 'pupaja' => 'unreal'];
    print kiz_yii_var_inspect($someArray);

    print kiz_yii_var_inspect($_REQUEST);

?>



