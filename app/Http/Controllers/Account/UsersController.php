<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\User;
use function view;

class UsersController extends Controller
{
    public function index()
    {
        return view('account.index', ['user' => auth()->user()]);
    }

    public function edit(User $user)
    {
        return view('account.users.edit', compact('user'));
    }

    public  function update(UpdateAccountRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect(route('account.index'))->with('success', 'Data was updated');
    }
}
