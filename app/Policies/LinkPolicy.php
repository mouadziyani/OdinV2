<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;

class LinkPolicy
{
    /**
     * Determine whether the user can view any links.
     */
    public function viewAny(User $user): bool
    {
        // Tous les utilisateurs authentifiés peuvent voir la liste de leurs liens
        return true;
    }

    /**
     * Determine whether the user can view the link.
     */
    public function view(User $user, Link $link): bool
    {
        // // Le propriétaire ou admin ou partagé avec l'utilisateur
        // return $user->id === $link->user_id // propriétaire
        //     || $user->roles->contains('name', 'admin') // admin
        //     || $link->sharedWith->contains('id', $user->id); // partagé avec

        return true;
    
        }

    /**
     * Determine whether the user can create a link.
     */
    public function create(User $user): bool
    {
        // Seulement admin ou editor
        // return $user->roles->contains('name', 'admin')
        //     || $user->roles->contains('name', 'editor');
    return true ;
        }

    /**
     * Determine whether the user can update the link.
     */
    public function update(User $user, Link $link): bool
    {
        // Propriétaire ou admin
        if ($user->id === $link->user_id || $user->roles->contains('name', 'admin')) {
            return true;
        }

        // Vérifier si le lien est partagé avec permission édition
        $shared = $link->sharedWith->firstWhere('id', $user->id);
        return $shared && $shared->pivot->permission === 'edition';
    }

    /**
     * Determine whether the user can delete the link.
     */
    public function delete(User $user, Link $link): bool
    {
        // Propriétaire ou admin
        return $user->id === $link->user_id || $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can restore the link.
     */
    public function restore(User $user, Link $link): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can permanently delete the link.
     */
    public function forceDelete(User $user, Link $link): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
