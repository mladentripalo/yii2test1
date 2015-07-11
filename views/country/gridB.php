<?php

    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    use app\models\Country;
    use app\models\Continent;
    use \yii\data\ActiveDataProvider;
    use \yii\grid\GridView;
    use yii\data\Sort;

    ___kiz_pre_code_start();
    $dataProvider = new ActiveDataProvider([
        'query' => Country::find()
            ->joinWith('continent'),
        'pagination' => [
            'totalCount' => Country::find()->count(),
            'pageSize' => 5
        ],
        'sort' => [
            'attributes' => [
                'name',
                'population',
                'code',
                'continent_name' => [
                    'asc' => ['continent.name' => SORT_ASC],
                    'desc' => ['continent.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ]
            ]
        ]
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            'name',
            'code',
            'population',
            'continent_name'
            /*
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
            */
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