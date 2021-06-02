<?php

namespace frontend\modules\user\controllers;

use frontend\models\User;
use yii\web\Controller;




use Yii;

/**
 * Default controller for the `user` module
 */
class ProfileController extends Controller
{
    public function actionView($username) 
    {
        $user = User::findByUsername($username);
        return $this->render('view', [
            'user' => $user,
        ]);
    }

    public function actionAddfriend($id){
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        $curentUser = Yii::$app->user->identity;
        $user = User::findOne($id);
        $curentUser->sendFriendRequest($user->id);
        return $this->redirect(['/user/profile/view', 'username'=>$user->username]);
    }


    public function actionCancelfriend($id){
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        $curentUser = Yii::$app->user->identity;
        $user = User::findOne($id);
        $curentUser->cancelFriendRequest($user->id);
        return $this->redirect(['/user/profile/view', 'username'=>$user->username]);
    }

    public function actionConfirmfriend($id){
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        $curentUser = Yii::$app->user->identity;
        $user = User::findOne($id);
        $curentUser->confirmfriend($user->id);
        return $this->redirect(['/user/profile/view', 'username'=>$user->username]);
    }


    public function actionDeletefriend($id){
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        $curentUser = Yii::$app->user->identity;
        $user = User::findOne($id);
        $curentUser->deleteFriend($user->id);
        return $this->redirect(['/user/profile/view', 'username'=>$user->username]);
    }

    public function actionRejectfriend($id){
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        $curentUser = Yii::$app->user->identity;
        $user = User::findOne($id);
        $curentUser->rejectFriend($user->id);
        return $this->redirect(['/user/profile/view', 'username'=>$user->username]);
    }
}
