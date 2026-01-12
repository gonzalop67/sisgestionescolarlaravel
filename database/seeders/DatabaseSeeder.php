<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'Freddy Hilari',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('ADMINISTRADOR');

        Configuracion::create([
            'nombre' => 'Unidad Educativa Hilari Web',
            'descripcion' => 'Unidad Educativa para todos',
            'direccion' => 'ZONA MIRAFLORES AV 5 CALLE MEJILLOS NRO 200',
            'telefono' => '75657007 - 54646787',
            'divisa' => 'Bs',
            'correo_electronico' => 'hilariweb@gmail.com',
            'web' => 'https://hilariweb.com',
            'logo' => 'uploads/logos/BWgoHb5AdaZHOjECmFo07atZyJVK2FgwEC3Ypiah.jpg',
        ]);

        Gestion::create(['nombre' => '2024']);
        Gestion::create(['nombre' => '2025']);
        Gestion::create(['nombre' => '2026']);

        Periodo::create(['nombre' => '1er. Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '2do. Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '3er. Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '1er. Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => '2do. Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => '3er. Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => '1er. Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => '2do. Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => '3er. Trimestre', 'gestion_id' => 3]);

        Nivel::create(['nombre' => 'INICIAL']);
        Nivel::create(['nombre' => 'PRIMARIA']);
        Nivel::create(['nombre' => 'SECUENDARIA']);

        Grado::create(['nombre' => '1ro. Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '2do. Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '1ro. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2do. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '3ro. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '4to. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '5to. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '6to. Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '1ro. Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '2do. Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '3ro. Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '4to. Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '5to. Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '6to. Secundaria', 'nivel_id' => 3]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 1]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 2]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 3]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 4]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 5]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 6]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 7]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 8]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 9]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 10]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 11]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 12]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 13]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 14]);

        Turno::create(['nombre' => 'Mañana']);
        Turno::create(['nombre' => 'Tarde']);
        Turno::create(['nombre' => 'Noche']);

        Materia::create(['nombre' => 'BIOLOGIA']);
        Materia::create(['nombre' => 'CIENCIAS NATURALES']);
        Materia::create(['nombre' => 'FISICA']);
        Materia::create(['nombre' => 'QUIMICA']);
        Materia::create(['nombre' => 'CIVICA Y ACOMPAÑAMIENTO INTEGRAL EN EL AULA']);
        Materia::create(['nombre' => 'EDUCACION PARA LA CIUDADANIA']);
        Materia::create(['nombre' => 'ESTUDIOS SOCIALES']);
        Materia::create(['nombre' => 'FILOSOFIA']);
        Materia::create(['nombre' => 'HISTORIA']);
        Materia::create(['nombre' => 'EDUCACION CULTURAL Y ARTISTICA']);
        Materia::create(['nombre' => 'EDUCACION FISICA']);
        Materia::create(['nombre' => 'INGLES']);
        Materia::create(['nombre' => 'LENGUA Y LITERATURA']);
        Materia::create(['nombre' => 'MATEMATICA']);
        Materia::create(['nombre' => 'EMPRENDIMIENTO Y GESTION']);
    }
}
