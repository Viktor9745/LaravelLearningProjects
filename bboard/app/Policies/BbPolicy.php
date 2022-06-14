<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Bb;

class BbPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Bb $bb){
        return $bb->user->id===$user->id;
    }

    public function destroy(User $user, Bb $bb){
        return $this->update($user, $bb);
    }

    public function __construct()
    {
        //
    }
}
