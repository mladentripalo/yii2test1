<?php

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    use app\models\Country;
    use app\models\Continent;
    use \yii\data\ActiveDataProvider;
    use \yii\grid\GridView;
    use yii\data\Sort;

?>

    <?php
    ___kiz_pre_code_start();
    $query = new \yii\db\Query([
        'select' => [
            'ivica' => 'country.name',
            'marica' => 'country.code',
            'janica' => 'continent.name',
        ],
        'from' => ['country'],
        'join' => [
            ['LEFT JOIN', 'continent', 'country.continent_id = continent.continent_id'],
            ],

        // this is required for action buttons in grid view to work properly (view/update/delete)
        // otherwise, since ActiveRecord is not defined, buttons createUrl() dont know how to form
        // proper request, instead uses index in currently viewing table, try removing this and watch
        // action buttons URL-s to get the idea.
        //
        // this property can be ommited if we use GridView without action buttons, i.e. just to view data.
        'indexBy' => 'marica',
    ]);

    $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'totalCount' => Country::find()->count(),
            'pageSize' => 5
        ],
        'sort' => ['attributes' => [ 'ivica','marica','janica' ]]
    ]);
        $result = GridView::widget([
            'dataProvider' => $dataProvider,
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
    $code = ___kiz_pre_code_end();
    ?>

<?= $result ?>

<h2>Using simple custom Query method</h2>
<p>Both previously described methods showed flaws and performance issues...</p>

<ul>
    <li>
        <a href="<?=Yii::$app->getHomeUrl()?>?r=country/show&view=gridA">gridA method link</a> <br/>
        This method was "the proper way" by Yii2 to join and sort table but had its issues,
        the sorting by continent.name did not work even after properly joining other table, second
        joining method called subqueries for each row to find continent which can cause serious
        performance issues on big tables.
    </li>
    <li>
        <a href="<?=Yii::$app->getHomeUrl()?>?r=country/show&view=gridB">ridA method link</a> <br/>
        Second method fixed sorting by continent.name but required custom Sort class definition and had
        an inadverse effect that i dont like: after sorting URL contained sort commands with table name and column name
        shown to the user, which is bad and security risk imo. I havent found a way to fix this but writing
        new class extended from yii\data\Sort and overloading CreateUrl() method and few others to be able
        to add an option in attributes array such as 'urlLabel' for example, which was too much fuss so i gave up.
    </li>

    <li>
        Both above examples dabble in ActiveRecord arrays, ActiveQueries and alot of class wrappers stuff which i found
        inefficient and bloatwise for simply displaying table grid to screen. I dont think ActiveRecords are necessary
        to use and consume memory and server performance for this simple display. Edit/Update/Delete buttins still work
        normally by calling a controller of its own

        Now in this method I believe is the best way to do this, still a bit longer than passing the querry directly
        in SQL but performance-wise identical and much more cross-database engine compatible, so here it is...
    </li>

</ul>

<h3>Simple Query method for joined GridView (rows editable, sortable)...</h3>
<p>
    first we create the query from scratch...
</p>

<?= $code ?>

