<?php

use app\models\Violations;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Violations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'car_id',
                'value' => function ($model) {
                    return $model->car ? $model->car->number_car : null;
                }
            ],
            'date',
            'time',
            'type',
            'price',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Violations $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
