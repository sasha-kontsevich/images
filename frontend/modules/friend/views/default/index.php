<?php

use yii\helpers\Url;

?>

<div class="container">
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-6">
        <h1>Мои друзья</h1>
            <?php  foreach ($friends as $friend) : ?>
                <a href="<?php echo Url::to(['/user/profile/view', 'username' => $friend['username']]); ?>">
                    <div class="friend-item">
                        <div class="friend-avatar" style="background-image: url(<? echo Url::to(['../images/']).'/' . $friend['avatar']; ?>)"></div>
                        <div class="friend-name">
                            <?= $friend['name'] ?>
                            <?= $friend['surname'] ?>
                        </div>
                    </div>
                </a>
            <? endforeach; ?>

            <h2>Входящие заявки</h2>
            <?php foreach ($incoming as $incom) : ?>
                <a href="<?php echo Url::to(['/user/profile/view', 'username' => $incom['username']]); ?>">
                    <div class="friend-item">
                        <div class="friend-avatar" style="background-image: url(<? echo Url::to(['../images/']).'/' . $incom['avatar']; ?>)"></div>
                        <div class="friend-name">
                            <?= $incom['name'] ?>
                            <?= $incom['surname'] ?>
                        </div>
                    </div>
                </a>
            <? endforeach; ?>
            
            <h2>Исходящие заявки</h2>
            <?php foreach ($outcoming as $outcom) : ?>
                <a href="<?php echo Url::to(['/user/profile/view', 'username' => $outcom['username']]); ?>">
                    <div class="friend-item">
                        <div class="friend-avatar" style="background-image: url(<? echo Url::to(['../images/']).'/' . $outcom['avatar']; ?>)"></div>
                        <div class="friend-name">
                            <?= $outcom['name'] ?>
                            <?= $outcom['surname'] ?>
                        </div>
                    </div>
                </a>
            <? endforeach; ?>

        </div>
    </div>

</div>