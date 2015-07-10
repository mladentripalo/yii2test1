<?php

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    use app\models\Country;
    use app\models\Continent;
    use \yii\data\ActiveDataProvider;
    use \yii\grid\GridView;
    use yii\data\Sort;

    ___kiz_pre_code_start();
    $dataProvider = new ActiveDataProvider([
        'query' => Country::find()->joinWith('continent'),
        'pagination' => [
            'totalCount' => Country::find()->count(),
            'pageSize' => 5
        ],
        // sort class can be manually instantiated using: $srt = new \yii\data\Sort(['attributes' => [ 'name' .....
        //'sort' => $srt
        // or defined in place like below

        'sort' => [
            'attributes' => [
                'name',
                /* default values for sort attribute (if not set)
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => Inflector::camel2words('name'),
                ], */

                /* sorting is also possible using multiple criteria like this...
                'name' => [
                    'asc' => ['name' => SORT_ASC, 'population' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC, 'population' => SORT_ASC],
                    'default' => SORT_ASC,
                    'label' => Inflector::camel2words('name'),
                ], */

                'population',
                'code',
                'continent.name'
            ]
        ]
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                // 'yii\grid\DataColumn is default
                // 'class' => 'yii\grid\DataColumn',
                'attribute' => 'name',
                'label' => 'Država'
            ],
            [
                'attribute' => 'code',
                'label' => 'Skraćeno',
            ],
            [
                'attribute' => 'population',
                'label' => 'Broj stanovnika',
            ],
            [
                'attribute' => 'continent.name',
                'label' => 'Kontinent',
            ],
            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'controller' => 'CountryGridEdit'
            ]
        ]
    ]);
    $code = ___kiz_pre_code_end();
?>

    <h2>Using ActiveRecord -> ActiveQuery method</h2>
    <p>
        Fixed <a href="<?=Yii::$app->getHomeUrl()?>?r=country/show&view=gridA">sorting problem from previous example</a> by adding custom sorting class to DataProvider.
    </p>
    <h2>Code:</h2>
<?= $code ?>