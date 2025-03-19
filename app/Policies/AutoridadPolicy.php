<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Autoridad;
use Illuminate\Auth\Access\HandlesAuthorization;

class AutoridadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_autoridad');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Autoridad $autoridad): bool
    {
        return $user->can('view_autoridad');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_autoridad');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Autoridad $autoridad): bool
    {
        return $user->can('update_autoridad');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Autoridad $autoridad): bool
    {
        return $user->can('delete_autoridad');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_autoridad');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Autoridad $autoridad): bool
    {
        return $user->can('force_delete_autoridad');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_autoridad');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Autoridad $autoridad): bool
    {
        return $user->can('restore_autoridad');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_autoridad');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Autoridad $autoridad): bool
    {
        return $user->can('replicate_autoridad');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_autoridad');
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
