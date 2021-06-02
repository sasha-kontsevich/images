<?php

namespace frontend\modules\user\controllers;

use yii\web\Controller;




use Yii;

/**
 * Default controller for the `user` module
 */
class ProfileController extends Controller
{
    public function actionView($id) 
    {
        return $this->render('view');
    }
}
