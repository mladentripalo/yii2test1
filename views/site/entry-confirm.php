<?php
    use yii\helpers\Html;
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->yourName) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->yourEmail) ?></li>
</ul>
