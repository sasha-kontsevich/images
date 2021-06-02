<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property integer $user
 * @property integer $friend
 * @property integer $status
 */
class Friend extends ActiveRecord
{
}