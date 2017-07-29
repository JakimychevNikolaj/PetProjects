<?php

namespace frontend\models;

use common\models\database\BaseComment;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;
    public $postId;

    public function rules()
    {
        return [
            [['comment', 'postId'], 'required'],
            [['comment'], 'string', 'length' => [3, 250]]
        ];
    }

    public function saveComment($name)
    {
        $comment = new BaseComment();
        $comment->message = $this->comment;
        $comment->userId = \Yii::$app->user->id;
        $comment->postId = $this->postId;
        $comment->date = date('Y-m-d H:i:s', time());
        $comment->name = $name;

        return $comment->save();
    }

}
