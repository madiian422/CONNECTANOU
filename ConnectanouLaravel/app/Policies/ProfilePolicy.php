<?php

namespace App\Policies;

use App\User;
use App\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any profiles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        // determine si l'utilisateur peux mettre à jour son profil
        // Le username de l'utilisateur doit etre égale au username de l'utilisateur qui détient le profil

        return $user->username == $profile->user->username;

    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Profile  $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }
}
