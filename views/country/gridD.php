<?php
    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';


    ___kiz_pre_code_start();

    //$count = (int)\app\models\Country::find()->count();

    //or if u wish to avoid ActiveRecord at all...

    $count = (int)Yii::$app->db->createCommand(
        'SELECT COUNT(*) FROM country'
    )->queryScalar();


    $sqlQuery = <<<SQL
        SELECT country.name AS ivica, country.code AS marica, continent.name AS janica
        FROM country
        LEFT JOIN continent ON country.continent_id = continent.continent_id
SQL;

    // alternatively a Yii Querry class can be used to render SQL command if
    // cross-database engine compatibility is issue, however, above method is faster :)
    /*
    $sqlQuery = (new \yii\db\Query([
        'select' => [
            'ivica' => 'country.name',
            'marica' => 'country.code',
            'janica' => 'continent.name',
        ],
        'from' => ['country'],
        'join' => [['LEFT JOIN', 'continent', 'country.continent_id = continent.continent_id']]
    ]))->createCommand()->sql;
    */

    $gridView = new \yii\grid\GridView([
        'dataProvider' => new \yii\data\SqlDataProvider([
            'sql' => $sqlQuery,
            'totalCount' => $count,
            'pagination' => ['pageSize' => 5],
            'key' => 'marica', // key property can be ommited if we use GridView without action buttons, i.e. just to view data.
            'sort' => ['attributes' => ['ivica', 'marica', 'janica']]
        ]),

        // this entire columns section can be ommited if we dont need action buttons
        'columns' => [
            ['attribute' => 'ivica'],
            ['attribute' => 'marica'],
            ['attribute' => 'janica'],
            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'controller' => 'CountryGridEdit'
            ],
        ],

    ]);
    // to render widget use '$gridView->run();'

    $code = ___kiz_pre_code_end();
?>

<h2>Alternative (even faster) to <a href="<?=Yii::$app->getHomeUrl()?>?r=country/show&view=gridA">gridC method</a></h2>

<?php $gridView->run() ?>

<h4>Code:</h4>
<?= $code ?>





