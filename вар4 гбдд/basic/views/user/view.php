<?php

use app\models\Violations;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'username' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить аккаунт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'password',
        ],
    ]) ?>

    <?php
    if (!Yii::$app->user->identity->isAdmin()):
        $car = $model->getCars()->one();
        if ($car):
            ?>
            <div class="car-view">

                <h2>Моя машина</h2>

                <p>
                    <?= Html::a('Редактировать', ['car/update', 'id' => $car->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['car/delete', 'id' => $car->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить эту машину?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $car,
                    'attributes' => [
                        'number_car',
                    ],
                ]) ?>

            </div>
        <?php else: ?>
            <p>
                <?= Html::a('Добавить машину', ['car/create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif; ?>
        <?php
        $violations = $car->getViolations()->all();
        if ($violations):
            ?>
            <div class="car-view">

                <h2>Мои нарушения</h2>
                <?= GridView::widget([
                    'dataProvider' => new ArrayDataProvider([
                        'allModels' => $violations,
                    ]),
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'date',
                        'time',
                        'type',
                        'price',
                        'status',
                        ['format' => 'raw',
                            'value' => function ($car) {
                                return Html::a('Оплатить', ['violations/delete', 'id' => $car->id], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'confirm' => 'Вы готовы оплатить нарушение??',
                                        'method' => 'post',
                                    ],
                                ]);

                            }
                        ],
                    ],
                ]); ?>
            </div>
        <?php else: ?>
            <h2>У вас нет нарушений</h2>
        <?php endif; ?>
    <?php endif; ?>
</div>
