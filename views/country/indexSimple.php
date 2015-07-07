<?php

    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    /** @noinspection PhpIncludeInspection */
    require_once \Yii::$app->basePath . '\kiz\kiz_yii.php';

    /**
     * @var $this yii\web\View
     * @var \app\models\Country [] $countries
     * @var yii\data\Pagination $pagination
     */

?>

<h2>Countries</h2>
<p>
    See code comment how countries are prepared, pagination object is also prepared in
    controller action and passed here into view...<br>
    Country::find() first create ActiveQuery instance which, when executed with ->all() returns an array of
    app\models\Country (ActiveRecord classes). <br>
    Before ->all() is called on querry (which actually executes SQL statement and gets data) it is
    possible to link-pass options to query as seen here using ->offset() and ->limit().
</p>

<?php
    ob_start();
    echo '<ul>';
    ___pre_code_start();
    /**
     * action CountryController::actionIndexSimple()
     * contains following relevent code:
     * $query = Country::find();
     * $countries = $query->orderBy('name')
     *                    ->offset($pagination->offset)
     *                    ->limit($pagination->limit)
     *                    ->all();
    */
    foreach ($countries as $c)
        echo
            '<li>' ,
                Html::encode($c->name) ,
                '(', $c->code, ') :' ,
                $c->population, ' Continent: ', $c->continent_name,
            '</li>';
    echo '</ul>';
    echo LinkPager::widget(['pagination'=>$pagination]);
    $code = ___pre_code_end();
    $output = ob_get_contents();
    ob_end_clean();
    echo $code, $output;
?>


