<?php

namespace App\Policies;

use App\User;
use App\Vc;
use Illuminate\Auth\Access\HandlesAuthorization;

class CvPolicy
{
    use HandlesAuthorization;
    /*donner a l'administrateur tous les droits  si la fonction before return true alors il ne prand pas en considiration les autres fonction sinon il part pour verifier les autre fonction 
    
    et largument $ability determine quell'est le fonction qu'on veut le verifier 
    */
    public function before($user,$ability){
        if($user->is_admin and $ability != 'delete'){
            return true;
        }
        /*if($user->is_admin){
            return true;
        }*/
        

    }

    /**
     * Determine whether the user can view the vc.
     *
     * @param  \App\User  $user
     * @param  \App\Vc  $vc
     * @return mixed
     */
    public function view(User $user, Vc $vc)
    {
        return true;
    }

    /**
     * Determine whether the user can create vcs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the vc.
     *
     * @param  \App\User  $user
     * @param  \App\Vc  $vc
     * @return mixed
     */
    public function update(User $user, Vc $vc)
    {
        return $user->id == $vc->user_id;
    }

    /**
     * Determine whether the user can delete the vc.
     *
     * @param  \App\User  $user
     * @param  \App\Vc  $vc
     * @return mixed
     */
    public function delete(User $user, Vc $vc)
    {
        return $user->id == $vc->user_id;
    }
}
