<?php

    require_once APP_BASE_PATH.'\kiz\kiz_yii.php';





    $drz = \app\models\Country::findOne('AU');      /** @var \app\models\Country $drz ; */

    //echo kiz_yii_varInspect($drz);
    echo kiz_yii_varDump($drz);

    echo kiz_yii_varDump($drz->continent_name);
    echo kiz_yii_varDump($drz->attributeLabels());
    //\yii\helpers\VarDumper::dump($drz,10,true);
    echo '</br>';


    $cont = $drz->getContinent()->one();
    echo kiz_yii_varDump($cont);

