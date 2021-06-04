<?php

namespace frontend\modules\user\models;

use yii\base\Model;
use frontend\models\User;
use Yii;


/**
 * Add Post Form
 */

class ChangeAvatarForm extends Model
{
    public $fileName;
    public $avatar;


    public function rules()
    {
        return [
            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];

    }

    public function changeAvatar() {
        $model = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        if ($this->validate()) {
            $dir = 'images/'; // Директория - должна быть создана
            $this->fileName = $this->randomFileName($this->avatar->extension);
            $file = $dir . $this->fileName;
            $this->avatar->saveAs($file); // Сохраняем файл

            $model->avatar = $this->fileName;
            return $model->save() ? $model : null;
        }
    }
    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $file = time() . Yii::$app->user->identity->id  . $extension;
        } while (file_exists($file));
        return $file;
    }
}