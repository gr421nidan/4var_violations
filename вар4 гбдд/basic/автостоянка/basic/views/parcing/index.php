<?php

use app\models\Parcing;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Parcings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Parcing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'car_id',
            'date_in',
            'date_out',
            'price',
            //'discount',
            //'dedt',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Parcing $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
