<?php

use app\models\Car;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Машины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'number_car',
            ['format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Выписать штраф', ['violations/create', 'id' => $model->id], [
                        'class' => 'btn btn-primary',
                    ]);

                }
            ],
        ],
    ]); ?>


</div>
