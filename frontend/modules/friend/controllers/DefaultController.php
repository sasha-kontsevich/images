<?php

namespace frontend\modules\friend\controllers;

use frontend\models\Friend;
use Yii;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `friend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $currentUser = Yii::$app->user->identity->id;
        //Друзья
        $query1 = new Query();
        $query1->select(['name' => 'user.name', 'surname' => 'user.surname', 'username' => 'user.username', 'avatar' => 'user.avatar'])
        ->from('friend')
        ->leftJoin('user','`friend`.`friend`=`user`.`id`')
        ->where(['`friend`.`user`' => $currentUser, '`friend`.`status`'=> 1]);
        $command1 = $query1->createCommand();
        $friends = $command1->queryAll();

        //Входящие
        $query2 = new Query();
        $query2->select(['name' => 'user.name', 'surname' => 'user.surname', 'username' => 'user.username', 'avatar' => 'user.avatar'])
        ->from('friend')
        ->leftJoin('user','`friend`.`friend`=`user`.`id`')
        ->where(['`friend`.`friend`' => $currentUser, '`friend`.`status`'=> 0]);
        $command2 = $query2->createCommand();
        $incoming = $command2->queryAll();


        //Исходящие
        $query3 = new Query();
        $query3->select(['name' => 'user.name', 'surname' => 'user.surname', 'username' => 'user.username', 'avatar' => 'user.avatar'])
        ->from('friend')
        ->leftJoin('user','`friend`.`friend`=`user`.`id`')
        ->where(['`friend`.`user`' => $currentUser, '`friend`.`status`'=> 0]);
        $command3 = $query3->createCommand();
        $outcoming = $command3->queryAll();

        // print_r($outcoming);
        // exit;
        return $this->render('index',[
            'friends'=> $friends,
            'incoming'=> $incoming,
            'outcoming'=> $outcoming,
        ]);
    }
}
