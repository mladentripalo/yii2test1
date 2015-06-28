<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin();
    echo $form->field($model,'efNamme');
    echo $form->field($model,'efEmail');

    echo '<div class="form-group">';
    {
        echo Html::submitButton('Submit', ['class', 'btn btn-primary']);
    }
    echo '</div>';

    ActiveForm::end();

?>

