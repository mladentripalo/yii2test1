<?php
    use yii\helpers\Html;

    /**
     * @var \app\models\Country $model
     */
?>

<h3><?= Html::encode($model->code) ?></h3>
<p>
    <em>Name:</em>
    <strong><?= Html::encode($model->name) ?></strong>
    <em>Population:</em>
    <strong><?= $model->population ?></strong>
</p>
<hr/>