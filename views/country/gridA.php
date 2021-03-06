<?php

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    use app\models\Country;
    use app\models\Continent;
    use \yii\data\ActiveDataProvider;
    use \yii\grid\GridView;

    ___kiz_pre_code_start();
    echo GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Country::find(),
            //'query' => Country::find()->joinWith('continent'),
            'pagination' => ['pageSize' => 5],
        ]),
        'columns' => [
            'name',
            'code',
            'population',
            'continent_name',

            /*
            [   'class' => '\yii\grid\ActionColumn',
                'buttons' => [ 'primjer' => function ($url, $model, $key){return '<a href="#">Primjer</a>';} ],
                'template' => '{view} {update} {delete} {primjer}',
                'controller' => 'CountryGridEdit'
            ]
            */
        ]
    ]);
    $code = ___kiz_pre_code_end();
?>

<h2>Using ActiveRecord -> ActiveQuery method</h2>
<p>
    Table is not sortable by continent? 'country' table was joined with 'continent' table
    properly and continent column is displayed properly, however there is no sorting option on Kontinent column.
    In order to fox this I created sorting class manually in DataProvider,
    <a href="<?= Yii::$app->getHomeUrl() ?>?r=country/show&view=gridB">follow this link</a>.

</p>
<h2>Code:</h2>
<?= $code ?>

