<?php
/**
 * Created by PhpStorm.
 * User: Kiz
 * Date: 4.7.2015.
 * Time: 11:21
 *
 *
 */

    require_once('C:\xampp\htdocs\phpStorm\yii2test1\kiz\kiz_yii.php');
    use \app\models\Drzava;
    use app\models\Kontinent;
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

<pre>


    <?php

        // returns ActiveQuery


        /*
        $something = Drzava::find()->joinWith(['Kontinent']);
        echo $something->className() . "\n";
        indent_print_r($something->all());
        */

        /** @var Drzava $drz; */
        $drz = Drzava::findOne('AU');

        if($drz){

            kiz_yii_var_inspect($drz);

            YII_DEBUG && assert('$drz->className()==="app\models\Drzava"');

            echo "\n" . $drz->code;
            echo "\n" . $drz->name;
            echo "\n" . $drz->population;
            echo "\n" . $drz->kontinent;
        }
        else
            echo "\n\$drz Not Found!";

        echo 'path: ', Yii::$app->basePath;


        /** @var ActiveQuery $aquery */
        $aquery = Drzava::find()->joinWith(['Kontinent']);

        if($aquery){

            kiz_yii_var_inspect($aquery);

            $tupac = 'Kopa kabana!';
            kiz_yii_var_inspect($tupac);

            $inatager = 375;
            kiz_yii_var_inspect($inatager);

            $faloat = 375.44;
            kiz_yii_var_inspect($faloat);

            $auraay = ['tenk', 'boca', 'pupaja'=>'unreal'];
            kiz_yii_var_inspect($auraay);

        }
        else
            echo "\n\$aquery Not Found!";



    ?>


    <h3>Code:</h3>
    <pre>
    $res = (new Query)
        ->select(['country.code','country.name','country.population', 'continent'=>'continent.name'])
        ->from(['country'])
        ->leftJoin('continent', 'country.continent_id=continent.continent_id')
        ->all();
    <strong>
    //this foreach loop creates above displayed table on screen </strong>
    foreach ($res as $r)
        printf("%30s %6s %16s %20s\n", $r['name'], $r['code'], $r['population'], $r['continent']);
    </pre>


    <p>
        Returned $res array has very JSON-like notation, containing main indexed array each nesting
        asociative array where coulumn names are keys...
    </p>


    <h3>Contents of returned $res array:</h3>

    <pre>

    </pre>



