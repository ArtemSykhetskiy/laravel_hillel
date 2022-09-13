<?php

namespace App\Repositories\Contracts;

use App\Models\Comment;

interface CommentsRepositoryContracts
{
    public function create(Comment $comment, string $model, int $id) : Comment|bool;
}
