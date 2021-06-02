<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h2>Пользователи</h2>
                <br>
                <?php foreach ($users as $user) : ?>
                    <a href="<?php echo Url::to(['/user/profile/view', 'id' => $user->id]); ?>">
                        <? echo $user->username; ?>
                    </a>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>