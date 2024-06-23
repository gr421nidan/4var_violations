<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Редактировать профиль: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
