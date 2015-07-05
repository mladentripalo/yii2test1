<?php

    use yii\web\Application;
    use \yii\db\ActiveQuery;

    use app\models\Ctry;
    use app\models\Cont;

    /** @noinspection PhpIncludeInspection */
    require_once \Yii::$app->basePath . '\kiz\kiz_yii.php';
?>

<p>
    Simple JQuerry clock: <span id="clk"></span>
</p>

<h3>Example code for kiz_yii_var_inspect() function</h3>

<pre>

    $drz = Drzava::findOne('HR');
    $drz && kiz_yii_var_inspect($drz);

    /** @var ActiveQuery $aquery */
    $aquery = Drzava::find()->joinWith(['Kontinent']);
    $aquery && kiz_yii_var_inspect($aquery);

    $someText = 'Kopa kabana!';
    kiz_yii_var_inspect($someText);

    $someInteger = 375;
    kiz_yii_var_inspect($someInteger);

    $someDouble = 375.44;
    kiz_yii_var_inspect($someDouble);

    $someArray = ['tenk', 'boca', 'pupaja' => 'unreal'];
    kiz_yii_var_inspect($someArray);

    kiz_yii_var_inspect($_REQUEST);
</pre>

    <h3>Output of above code:</h3>


<script>
    $(document).ready(function () {
        $('#clk').text((new Date()).toLocaleTimeString());
        setInterval(
            function(){$('#clk').text((new Date()).toLocaleTimeString())},
            1000);
    });
</script>

<?php
    /** @var Ctry $drz ; */
    $drz = Ctry::findOne('HR');
    $drz && kiz_yii_var_inspect($drz);

    /** @var ActiveQuery $aquery */
    $aquery = Ctry::find()->joinWith('cont');
    $aquery && kiz_yii_var_inspect($aquery);

    $res = $aquery->one();
    $res && kiz_yii_var_inspect($res);

    $someText = 'This is a string.';
    kiz_yii_var_inspect($someText);

    $someInteger = 375;
    kiz_yii_var_inspect($someInteger);

    $someDouble = 375.44;
    kiz_yii_var_inspect($someDouble);

    $someArray = ['tenk', 'boca', 'pupaja' => 'unreal'];
    kiz_yii_var_inspect($someArray);

    kiz_yii_var_inspect($_REQUEST);

?>