<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->name;

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
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'name',
            'surname',
        ],
    ]) ?>

    <?php if (!Yii::$app->user->identity->isAdmin()): ?>
        <div class="car-view">
            <?php $car = $model->getCars()->one();
            if ($car):
                ?>
                <h1>Моя машина</h1>
                <p>
                    <?= Html::a('Редактировать', ['car/update', 'id' => $car->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Удалить', ['car/delete', 'id' => $car->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('Припарковать', ['parcing/create', 'id' => $car->id], ['class' => 'btn btn-success']) ?>
                </p>

                <?= DetailView::widget([
                'model' => $car,
                'attributes' => [
                    'brand',
                ],
            ]) ?>
            <?php else: ?>
                <p>
                    <?= Html::a('Добавить машину', ['car/create'], ['class' => 'btn btn-success']) ?>
                </p>
            <?php endif; ?>

        </div>
    <?php endif; ?>


</div>
