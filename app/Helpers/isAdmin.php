<?php
use App\Models\Role;
use App\Models\User;

if(!function_exists("isAdmin")){
    function isAdmin(User $user) :bool
    {
        return $user->role->name === \App\Helpers\Enums\ROLES::Admin->value;
    }
}
