<?php

    use \yii\data\ActiveDataProvider;
    use yii\grid\GridView;

    /**
     * @var yii\web\View $this
     * @var \yii\db\ActiveQueryInterface $query
     */



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



