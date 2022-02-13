<?php

namespace App\Policies;

use App\User;
use App\Medical;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any medicals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the medical.
     *
     * @param  \App\User  $user
     * @param  \App\Medical  $medical
     * @return mixed
     */
    public function view(User $user, Medical $medical)
    {
        //
    }

    /**
     * Determine whether the user can create medicals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->email, [
            's214292312@mandela.ac.za',
        ]);
    }

    /**
     * Determine whether the user can update the medical.
     *
     * @param  \App\User  $user
     * @param  \App\Medical  $medical
     * @return mixed
     */
    public function update(User $user, Medical $medical)
    {
        return in_array($user->email, [
            's214292312@mandela.ac.za',
        ]);
    }

    /**
     * Determine whether the user can delete the medical.
     *
     * @param  \App\User  $user
     * @param  \App\Medical  $medical
     * @return mixed
     */
    public function delete(User $user, Medical $medical)
    {
        //
    }

    /**
     * Determine whether the user can restore the medical.
     *
     * @param  \App\User  $user
     * @param  \App\Medical  $medical
     * @return mixed
     */
    public function restore(User $user, Medical $medical)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the medical.
     *
     * @param  \App\User  $user
     * @param  \App\Medical  $medical
     * @return mixed
     */
    public function forceDelete(User $user, Medical $medical)
    {
        //
    }
}
