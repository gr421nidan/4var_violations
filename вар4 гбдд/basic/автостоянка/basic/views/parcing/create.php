<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parcing $model */

$this->title = 'Припарковаться';
$this->params['breadcrumbs'][] = ['label' => 'Parcings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
