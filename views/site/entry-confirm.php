<?php
    use yii\helpers\Html;
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->efName) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->efEmail) ?></li>
</ul>
