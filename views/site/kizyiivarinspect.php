<?php

    namespace kizyiivarinspect;

    use yii\web\Application;
    use app\models\Drzava;
    use \yii\db\ActiveQuery;

    /** @noinspection PhpIncludeInspection */
    require_once \Yii::$app->basePath . '\kiz\kiz_yii.php';
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

<?php
    /** @var Drzava $drz ; */
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

    kiz_yii_var_inspect($_SERVER);

    kiz_yii_var_inspect($_REQUEST);

?>