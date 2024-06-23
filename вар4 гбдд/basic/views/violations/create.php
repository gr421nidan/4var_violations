<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Violations $model */

$this->title = 'Выписать штраф';
$this->params['breadcrumbs'][] = ['label' => 'Violations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
