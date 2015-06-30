<?php

    use \yii\data\ActiveDataProvider;
    use yii\widgets\ListView;
    use yii\data\Pagination;

    /* @var yii\web\View $this */
    /* @var yii\db\ActiveQueryInterface $query */

    $pagination = new Pagination([
        'defaultPageSize' => 5,
        'totalCount' => $query->count()
    ]);

    $dataprovider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $pagination
        ])
?>

<h2>Countries ListView default:</h2>
<?= ListView::widget(['dataProvider' => $dataprovider]) ?>

<hr/>

<h2>Countries ListView using separate view per item (indexlistview_item.php)</h2>



<?=
    ListView::widget([
        'dataProvider' => $dataprovider,
        'itemView'=>'indexlistview_item'
    ])
?>


<script>


</script>

