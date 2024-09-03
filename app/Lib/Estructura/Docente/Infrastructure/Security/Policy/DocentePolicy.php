<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Docente\Infrastructure\Security\Policy;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

use App\Models\User;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;

class DocentePolicy {
	
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        //Log::debug('View Any: '.$user->name);
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Docente $docente): bool {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Docente $docente): bool {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Docente $docente): bool {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Docente $docente): bool {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Docente $docente): bool {
        return true;
    }
}

