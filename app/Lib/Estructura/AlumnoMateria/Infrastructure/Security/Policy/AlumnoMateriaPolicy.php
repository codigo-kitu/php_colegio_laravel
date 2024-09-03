<?php declare(strict_types = 1);

namespace App\Lib\Estructura\AlumnoMateria\Infrastructure\Security\Policy;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

use App\Models\User;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;

class AlumnoMateriaPolicy {
	
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
    public function view(User $user, AlumnoMateria $alumno_materia): bool {
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
    public function update(User $user, AlumnoMateria $alumno_materia): bool {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AlumnoMateria $alumno_materia): bool {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AlumnoMateria $alumno_materia): bool {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AlumnoMateria $alumno_materia): bool {
        return true;
    }
}

