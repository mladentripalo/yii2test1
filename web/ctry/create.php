<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ctry */

$this->title = 'Create Ctry';
$this->params['breadcrumbs'][] = ['label' => 'Ctries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ctry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
