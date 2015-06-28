<?php
    /* @var $this yii\web\View */
    /* @var $countries */
    /* @var $pagination */

    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>


<h2>Countries</h2>

<ul>
    <?php
        foreach ($countries as $c)
            echo
                '<li>' ,
                Html::encode($c->name) ,
                '(', $c->code, ') :' ,
                $c->population ,
                '</li>';
    ?>
</ul>

<?= LinkPager::widget(['pagination'=>$pagination]) ?>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
