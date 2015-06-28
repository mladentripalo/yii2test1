<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin();
    echo $form->field($model,'yourName');
    echo $form->field($model,'yourEmail');

    echo '<div class="form-group">';
    {
        echo Html::submitButton('Submit', ['class', 'btn btn-primary']);
    }
    echo '</div>';

    ActiveForm::end();

?>

