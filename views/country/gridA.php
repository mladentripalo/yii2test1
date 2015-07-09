<?php

    use app\models\Country;
    use app\models\Continent;
    use \yii\data\ActiveDataProvider;
    use \yii\grid\GridView;
    use yii\data\Pagination;

   /*
    // ovak ne radi, moras sam kreirat ActiveDataProvider instancu :(
    echo GridView::widget(
        'dataProvider' => [
            'query' => Country::find(),
            'pagination' => [
                'totalCount' => Country::find()->count(),
                'pageSize' => 6
            ]
        ]
    ]);
   */

    /*
     * ovo sljaka al lakse je na 3. nacin ispod
    echo GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Country::find(),
            'pagination' => new Pagination([
                'totalCount' => Country::find()->count(),
                'pageSize' => 6
            ])
        ])
    ]);
    */

    echo GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Country::find(),
            'pagination' => [
                'totalCount' => Country::find()->count(),
                'pageSize' => 5
            ]
        ]),
        'columns' => [


            [
                'class' => '\yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
            [
                'class' => 'yii\grid\DataColumn',
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
                'attribute' => 'continent_name',
                'label' => 'Kontinent',
            ]
        ]
    ]);





