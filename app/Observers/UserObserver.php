<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Handle to the User creating event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->api_token =  bin2hex(openssl_random_pseudo_bytes(30));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
//

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
//    public function deleted(User $user)
//    {
//        //
//    }
}