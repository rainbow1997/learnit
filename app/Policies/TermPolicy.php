<?php

namespace App\Policies;

use App\Users\User as User;
use App\Term as Term;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
{
    //age amal nakard moshkel az route
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //


    }
    public function update(User $user,Term $term)
    {
        return $user->id == 4;

    }


}
