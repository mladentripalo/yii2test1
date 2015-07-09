<?php

    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    /**
     * @var $this yii\web\View
     * @var \app\models\Country [] $countries
     * @var yii\data\Pagination $pagination
     * @var \yii\db\ActiveQuery $query
     */
?>

<style>@import "<?=APP_BASE_URL?>/web/css/kizstyles.css"</style>

<h2>Countries</h2>
<p>
    See code comment how countries are prepared, pagination object is also prepared in
    controller action and passed here into view...<br>
    <span class="codeLine_kiz">Country::find()</span> first create ActiveQuery instance which, when executed with ->all() returns an array of
    app\models\Country (ActiveRecord classes). <br>
    Before ->all() is called on querry (which actually executes SQL statement and gets data) it is
    possible to link-pass options to query as seen here using ->offset() and ->limit().
</p>

<?php
    ob_start();
    ___kiz_pre_code_start();
    /**
     * action CountryController::actionIndexSimple()
     * contains following relevent code:
     * $query = Country::find();
     * $countries = $query->orderBy('name')
                         ->offset($pagination->offset)
                         ->limit($pagination->limit)
                         ->all();
    */
    echo '<ul>';
    foreach ($countries as $c)
        echo
            '<li>' ,
                Html::encode($c->name) ,
                '(', $c->code, ') :' ,
                $c->population, ' Continent: ', $c->continent_name,
            '</li>';
    echo '</ul>';
    echo LinkPager::widget(['pagination'=>$pagination]);
    $code = ___kiz_pre_code_end();
    $output = ob_get_contents();
    ob_end_clean();
    echo $code, $output;
?>

<p>
    Note that <span class="codeLine_kiz">$c->continent_name</span> is pulled from other table trough foreign key.
    This is a <span class="redBold_kiz">BAD</span> practice because it is actually a function named
    <span class="codeLine_kiz">Country::getContinent_name()</span> which runs a query of its own in order to return
    continent name from continent table...
</p>


<?php
    echo  kiz_php_code2thml(
"        class Country extends ActiveRecord {

        /** @return \\yii\\db\\ActiveQuery */
        public function getContinent() {
            return \$this->hasOne(Continent::className(), ['continent_id' => 'continent_id']);
        }

        /** @return string */
        public function getContinent_name(){
            /** @var Continent \$cont */
            \$cont = \$this->getContinent()->one();
            return \$cont->name;
        }
    }");


?>


<p>
    This may be a covinient way but a subquery has to be called once per foreach loop
    which is <span class="redBold_kiz">not efficient</span> for big data. Much better way would be
    to let SQL engine join this data in one single query... for example:
</p>

<?php
    ob_start();
    ___kiz_pre_code_start();
    $query = (new \yii\db\Query())
        ->select([
                'country_name'=>'country.name',
                'country_code'=>'country.code',
                'total_population'=>'country.population',
                'continent_name'=>'continent.name'])
        ->from('country')
        ->leftJoin('continent','country.continent_id=continent.continent_id');

    echo \yii\grid\GridView::widget(
        ['dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => $pagination
            ])
        ]);
    $code = ___kiz_pre_code_end();
    $output = ob_get_contents();
    ob_end_clean();
?>
<?= $code ?>
<h4>Result:</h4>
<?= $output ?>










