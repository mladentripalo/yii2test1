<?php
    /* @var $this yii\web\View */
    /* @var $countries */
    /* @var $pagination */
    /* @var $query */

    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    use \yii\data\ActiveDataProvider;
    use yii\grid\GridView;
?>


<h2>Countries</h2>

<ul>
    <?php
        /*
        foreach ($countries as $c)
            echo
                '<li>' ,
                Html::encode($c->name) ,
                '(', $c->code, ') :' ,
                $c->population ,
                '</li>';
        */

        $dp = new ActiveDataProvider([
                'query' => $query,
                'pagination' => $pagination
            ]);
    ?>
</ul>

    <?= GridView::widget(['dataProvider' => $dp]) ?>

<?php
   // echo LinkPager::widget(['pagination'=>$pagination])
?>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
