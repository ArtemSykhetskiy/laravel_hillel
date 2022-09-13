<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\ReplyCommentRequest;
use App\Models\Comment;
use App\Repositories\Contracts\CommentsRepositoryContracts;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(CreateCommentRequest $request, CommentsRepositoryContracts $commentsRepository)
    {
        $commentsRepository->create(
            $request->user()->comments()->make($request->only('body')),
            $request->get('model_class'),
            $request->get('model_id')
        );

        return redirect()->back();
    }

    public function reply(ReplyCommentRequest $request, CommentsRepositoryContracts $commentsRepository)
    {
        $commentsRepository->create(
            $request->user()->comments()->make($request->only(['body', 'parent_id'])),
            $request->get('model_class'),
            $request->get('model_id')
        );

        return redirect()->back();
    }
}
