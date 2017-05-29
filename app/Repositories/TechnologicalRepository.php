<?php
namespace App\Repositories;

use App\User;
use App\Technological;

class TechnologicalRepository
{
    public function forUser(User $user)
    {
        return Technological::where('user_id', $user->id)
                    ->first();
    }
}