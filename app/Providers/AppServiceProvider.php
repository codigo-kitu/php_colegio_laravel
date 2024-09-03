<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
use App\Lib\Estructura\Alumno\Infrastructure\Security\Policy\AlumnoPolicy;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;
use App\Lib\Estructura\AlumnoMateria\Infrastructure\Security\Policy\AlumnoMateriaPolicy;

use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;
use App\Lib\Financiero\Contrato\Infrastructure\Security\Policy\ContratoPolicy;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;
use App\Lib\Estructura\Docente\Infrastructure\Security\Policy\DocentePolicy;

use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;
use App\Lib\Estructura\DocenteMateria\Infrastructure\Security\Policy\DocenteMateriaPolicy;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;
use App\Lib\Estructura\Materia\Infrastructure\Security\Policy\MateriaPolicy;

use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;
use App\Lib\Proceso\Matricula\Infrastructure\Security\Policy\MatriculaPolicy;

use App\Lib\Proceso\Nota\Domain\Entity\Nota;
use App\Lib\Proceso\Nota\Infrastructure\Security\Policy\NotaPolicy;

use App\Lib\Financiero\Pension\Domain\Entity\Pension;
use App\Lib\Financiero\Pension\Infrastructure\Security\Policy\PensionPolicy;

use App\Lib\Financiero\Sueldo\Domain\Entity\Sueldo;
use App\Lib\Financiero\Sueldo\Infrastructure\Security\Policy\SueldoPolicy;


//use App\Lib\Estructura\Materia\Domain\Model\MateriaModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(AlumnoMateria::class, AlumnoMateriaPolicy::class);
        Gate::policy(Contrato::class, ContratoPolicy::class);
        Gate::policy(Docente::class, DocentePolicy::class);
        Gate::policy(DocenteMateria::class, DocenteMateriaPolicy::class);
        Gate::policy(Materia::class, MateriaPolicy::class);
        Gate::policy(Matricula::class, MatriculaPolicy::class);
        Gate::policy(Nota::class, NotaPolicy::class);
        Gate::policy(Pension::class, PensionPolicy::class);
        Gate::policy(Sueldo::class, SueldoPolicy::class);
    }
}
