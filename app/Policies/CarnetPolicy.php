<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Carnet;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarnetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_carnet');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Carnet $carnet): bool
    {
        return $user->can('view_carnet');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_carnet');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Carnet $carnet): bool
    {
        return $user->can('update_carnet');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Carnet $carnet): bool
    {
        return $user->can('delete_carnet');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_carnet');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Carnet $carnet): bool
    {
        return $user->can('force_delete_carnet');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_carnet');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Carnet $carnet): bool
    {
        return $user->can('restore_carnet');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_carnet');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Carnet $carnet): bool
    {
        return $user->can('replicate_carnet');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_carnet');
    }

    public function audit(User $user): bool
    {
        return $user->can('replicate_estudiante');
    }

    public function restoreAudit(User $user): bool
    {
        return $user->can('reorder_estudiante');
    }
}
