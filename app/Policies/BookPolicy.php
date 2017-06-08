<?php

namespace App\Policies;

use App\Eloquent\User;
use App\Eloquent\Book;

class BookPolicy extends AbstractPolicy
{
    public function read(User $user, Book $ability)
    {
        return true;
    }

    public function update(User $user, Book $ability)
    {
        if (! isset($ability->owner_id)) {
            return false;
        }

        if ($user->id !== $ability->owner_id) {
            return false;
        }

        return true;
    }
}
