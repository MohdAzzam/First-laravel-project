<?php

namespace App\Policies;

use App\ImageUpload;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageUploadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImageUpload  $imageUpload
     * @return mixed
     */
    public function view(User $user, ImageUpload $imageUpload)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return in_array($user->email,[
            'admin@admin.com',
            'admin1@admin.com',

        ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImageUpload  $imageUpload
     * @return mixed
     */
    public function update(User $user, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImageUpload  $imageUpload
     * @return mixed
     */
    public function delete(User $user, ImageUpload $imageUpload)
    {

        return in_array($user->email,[
            'admin@admin.com',
            'admin1@admin.com',

        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImageUpload  $imageUpload
     * @return mixed
     */
    public function restore(User $user, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ImageUpload  $imageUpload
     * @return mixed
     */
    public function forceDelete(User $user, ImageUpload $imageUpload)
    {
        //
    }
}
