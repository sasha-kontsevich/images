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
    public function actionView($id) 
    {
        $user = User::findIdentity($id);
        return $this->render('view', [
            'user' => $user,
        ]);
    }
}
