<?php

    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    /**
     * @var $this yii\web\View
     * @var \app\models\Country [] $countries
     * @var yii\data\Pagination $pagination
     */

?>

<h2>Countries</h2>

<ul>
    <?php
        foreach ($countries as $c)
            echo
                '<li>' ,
                    Html::encode($c->name) ,
                    '(', $c->code, ') :' ,
                    $c->population,
                '</li>';
    ?>
</ul>

<?= LinkPager::widget(['pagination'=>$pagination]) ?>

