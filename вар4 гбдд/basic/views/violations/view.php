<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Violations $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Наришения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="violations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данное нарушение??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'car_id',
                'label' => 'Номер машины',
                'value' => function($model) {
                    return $model->car ? $model->car->number_car : 'Неизвестно';
                },
            ],
            'date',
            'time',
            'type',
            'price',
            'status',
        ],
    ]) ?>

</div>
