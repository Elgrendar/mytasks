<?php

namespace App\Policies;

use App\Models\Desktop;
use App\Models\User;

class DesktopPolicy
{
    /**
     * Determina si el usuario puede ver un escritorio.
     */
    public function view(User $user, Desktop $desktop)
    {
        return $user->id === $desktop->user_id;
    }

    /**
     * Determina si el usuario puede editar un escritorio.
     */
    public function update(User $user, Desktop $desktop)
    {
        return $user->id === $desktop->user_id;
    }

    /**
     * Determina si el usuario puede eliminar un escritorio.
     */
    public function delete(User $user, Desktop $desktop)
    {
        return $user->id === $desktop->user_id;
    }
}
