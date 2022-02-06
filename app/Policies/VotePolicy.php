<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
{
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

    public function deleteAny() { //buat hilangin delete bulk di filament admin
        
    }
    public function delete() { //buat hilangin delete di edit page
        
    }
}