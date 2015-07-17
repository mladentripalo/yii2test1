<?php






    require_once APP_BASE_PATH.'/kiz/kiz_yii.php';

    //___kiz_pre_code_start();
    //echo ___kiz_pre_code_end();

?>

<?= 'wbtestA' ?>

<?= yii\bootstrap\Progress::widget(['percent' => 60, 'label' => 'test']) ?>

<?php
// a button group using Dropdown widget
    echo yii\bootstrap\ButtonDropdown::widget([
        'label' => 'Action',
        'dropdown' => [
            'items' => [
                ['label' => 'DropdownA', 'url' => '/'],
                ['label' => 'DropdownB', 'url' => '#'],
            ],
        ],
    ]);

    echo yii\bootstrap\Button::widget([
        'label' => 'Action',
        'options' => ['class' => 'btn-lg'],
    ]);

    echo yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => 'Say hello...',
    ]);


?>