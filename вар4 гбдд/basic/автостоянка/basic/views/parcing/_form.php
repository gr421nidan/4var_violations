<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Parcing $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parcing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
