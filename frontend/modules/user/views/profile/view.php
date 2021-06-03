<?

use yii\helpers\Url;

$currentUser =  Yii::$app->user->identity;
?>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="profile-wrapper">
                <h3><?= $user->name ?> <?= $user->surname ?></h3>
                <img src="<? echo Url::to(['../images\/']) . $user->avatar; ?>" alt="" class="avatar">

                <div class="friend-controls">
                    <?php
                    if ($user->sendedRequest($currentUser->id)) {
                        echo '<a href="';
                        echo Url::to(['/user/profile/cancelfriend', 'id' => $user->id]);
                        echo '" class="btn btn-info">Отменить заявку</a>';
                    }
                    ?>
                    <?php
                    if ($user->hasRequest($currentUser->id)) {
                        echo '<a href="';
                        echo Url::to(['/user/profile/confirmfriend', 'id' => $user->id]);
                        echo '" class="btn btn-info">Принять заявку</a>';
                    }
                    ?>
                    <?php
                    if ($user->hasRequest($currentUser->id)) {
                        echo '<a href="';
                        echo Url::to(['/user/profile/rejectfriend', 'id' => $user->id]);
                        echo '" class="btn btn-info">Отклонить заявку</a>';
                    }
                    ?>
                    <?php
                    if ($user->notFriendOf($currentUser->id)) {
                        echo '<a href="';
                        echo Url::to(['/user/profile/addfriend', 'id' => $user->id]);
                        echo '" class="btn btn-info">Добавить в друзья</a>';
                    }
                    ?>
                    <?php
                    if ($user->friendOf($currentUser->id)) {
                        echo '<a href="';
                        echo Url::to(['/user/profile/deletefriend', 'id' => $user->id]);
                        echo '" class="btn btn-info">Удалить из друзей</a>';
                    }
                    ?>

                </div>

            </div>
        </div>
        <div class="col-md-7"></div>
        <div class="col-md-1"></div>
    </div>
</div>