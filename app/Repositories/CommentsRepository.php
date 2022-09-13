<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentsRepository implements Contracts\CommentsRepositoryContracts
{

    public function create(Comment $comment, string $model, int $id): Comment|bool
    {
        if(!class_exists($model)) {
            throw new \Exception("{$model} class doesnt exist");
        }

//        $model = new $model;
//        $model = $model->find($id);

        $model = app()->make($model)->find($id);

        return $model->comments()->save($comment);
    }
}
