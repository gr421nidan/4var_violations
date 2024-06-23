<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Автостоянка!</h1>

        <p class="lead">Хотите оставить пашину на парковке?</p>
        <?php if (!Yii::$app->user->isGuest): ?>
            <p><a class="btn btn-lg btn-success"
                  href="<?= yii\helpers\Url::to(['user/view', 'username' => Yii::$app->user->identity->username]) ?>">Припоркаваться</a>
            </p>
        <?php else: ?>
            <p><a class="btn btn-lg btn-success"
                  href="<?= yii\helpers\Url::to(['site/login']) ?>">Припоркаваться</a>
            </p>
        <?php endif; ?>

    </div>

</div>
