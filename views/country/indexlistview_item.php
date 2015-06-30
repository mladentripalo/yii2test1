<?php

    use \app\models\Country;
    use yii\helpers\Html;

    /**
     * @var Country $model
     */

?>

<div class="post">
    <h3><?= Html::encode($model->code) ?></h3>
    <p> Name: <?= Html::encode($model->name) ?> Population: <?= $model->population ?> </p>
</div>