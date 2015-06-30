<?php
    /* @var $this yii\web\View */
    /* @var $query */

    use \yii\data\ActiveDataProvider;
    use yii\grid\GridView;
?>


<h2>Countries GridView</h2>

    <?=
        GridView::widget(
            ['dataProvider' => new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize'=>5]

            ])
        ])
    ?>



