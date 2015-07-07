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
    $code = ___pre_code_end();
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
    $unformattedCode =
        "        class Country extends ActiveRecord {
        /** @return \\yii\\db\\ActiveQuery */
        public function getContinent() {
            return \$this->hasOne(Continent::className(), ['continent_id' => 'continent_id']); //tu je negdi
        }

        /**
        *
        * penzija skoro
        */

        /** @return string */
        public function getContinent_name(){ //papaja je
            /** @var Continent \$cont */
            \$cont = \$this->getContinent()->one(); // nikad nisam ja!!
            return \$cont->name;
        }
    }";


    $slc = '//_SLC_G2454kII905dhTsE_';
    $mlc = '/*_MLC_255RrT79712w0R_*/';
    $unformattedCode = preg_replace('#(*UTF8)(\/\/.*?)(?=[\n\r])#',$slc,$unformattedCode);
    $unformattedCode = preg_replace('#(*UTF8)(\/\*.*?\*\/)#s',$mlc,$unformattedCode);

    $code = kiz_php_code2thml($unformattedCode);

    echo $code;

    //kiz_php_code2thml($unformattedCode);

    /*
    foreach ($match[0] as $m) {
        $arr[] = str_replace(chr(0x0D),'',$m);
    }
    echo kiz_yii_var_inspect($arr);
    */

    //echo hexdump("\\r\\n \r \n");






    /*
    mbregex_encoding('UTF-8');
    mb_regex_set_options('gmd');
    mb_ereg('(\/\/.*?(?=\n))',$unformattedCode,$match);
    echo kiz_yii_var_inspect($match);
    */


    kiz_php_code2thml($unformattedCode);

?>


<p>
    This may be a covinient way but a subquery has to be called once per foreach loop
    which is <span class="redBold_kiz">not efficient</span> for big data. Much better way would be
    to let SQL engine join this data in one single query...
</p>

<?php
    /*
    echo kiz_yii_var_inspect($countries);
    echo kiz_yii_var_inspect($pagination);
    echo kiz_yii_var_inspect($query);
    */
?>





