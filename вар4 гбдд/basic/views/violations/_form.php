<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Violations $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="violations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'time')->input('time') ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
