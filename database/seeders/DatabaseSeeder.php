<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Personal;
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

        //Administrativo 1
        User::create(['name' => 'Juan Mendoza', 'email' => 'juan.mendoza@escuela.com', 'password' => Hash::make('87654321')])->assignRole('DIRECTOR/A GENERAL');
        Personal::create([
            'usuario_id' => 2,
            'tipo' => 'administrativo',
            'nombres' => 'Juan',
            'apellidos' => 'Mendoza',
            'ci' => '87654321',
            'fecha_nacimiento' => '1985-05-15',
            'direccion' => 'Av. Libertad 123',
            'telefono' => '76543210',
            'profesion' => 'Lic. en Matemáticas',
            'foto' => 'uploads/fotos/juan.jpg'
        ]);

        //Administrativo 2
        User::create(['name' => 'Carlos Rojas', 'email' => 'carlos.rojas@escuela.com', 'password' => Hash::make('76543210')])->assignRole('DIRECTOR/A ACADÉMICO');
        Personal::create([
            'usuario_id' => 3,
            'tipo' => 'administrativo',
            'nombres' => 'Carlos',
            'apellidos' => 'Rojas',
            'ci' => '76543210',
            'fecha_nacimiento' => '1978-11-22',
            'direccion' => 'Calle Junín 456',
            'telefono' => '65432109',
            'profesion' => 'Contador Público',
            'foto' => 'uploads/fotos/'.time().'_carlos.jpg'
        ]);

        //Administrativo 3
        User::create(['name' => 'Ana Torres', 'email' => 'ana.torres@escuela.com', 'password' => Hash::make('65432109')])->assignRole('DIRECTOR/A ADMINISTRATIVO');
        Personal::create([
            'usuario_id' => 4,
            'tipo' => 'administrativo',
            'nombres' => 'Ana',
            'apellidos' => 'Torres',
            'ci' => '65432109',
            'fecha_nacimiento' => '1992-03-30',
            'direccion' => 'Av. Bolívar 789',
            'telefono' => '54321098',
            'profesion' => 'Lic. en Administración',
            'foto' => 'uploads/fotos/'.time().'_ana.jpg'
        ]);

        //Administrativo 4
        User::create(['name' => 'Jorge Paz', 'email' => 'jorge.paz@escuela.com', 'password' => Hash::make('54321098')])->assignRole('CAJERO/A');
        Personal::create([
            'usuario_id' => 5,
            'tipo' => 'administrativo',
            'nombres' => 'Jorge',
            'apellidos' => 'Paz',
            'ci' => '54321098',
            'fecha_nacimiento' => '1980-07-18',
            'direccion' => 'Calle Sucre 321',
            'telefono' => '43210987',
            'profesion' => 'Contaduría Pública',
            'foto' => 'uploads/fotos/'.time().'_jorge.jpg'
        ]);

        //Administrativo 5
        User::create(['name' => 'Sofía Jiménez', 'email' => 'sofia.jimenez@escuela.com', 'password' => Hash::make('43210987')])->assignRole('SECRETARIO/A');
        Personal::create([
            'usuario_id' => 6,
            'tipo' => 'administrativo',
            'nombres' => 'Sofía',
            'apellidos' => 'Jiménez',
            'ci' => '43210987',
            'fecha_nacimiento' => '1987-09-25',
            'direccion' => 'Av. América 654',
            'telefono' => '32109876',
            'profesion' => 'Secretariado Ejecutivo',
            'foto' => 'uploads/fotos/'.time().'_sofia.jpg'
        ]);

        //Administrativo 6
        User::create(['name' => 'Ricardo Montero', 'email' => 'ricardo.montero@escuela.com', 'password' => Hash::make('11223344')])->assignRole('REGENTE');
        Personal::create([
            'usuario_id' => 7,
            'tipo' => 'administrativo',
            'nombres' => 'Ricardo',
            'apellidos' => 'Montero',
            'ci' => '11223344',
            'fecha_nacimiento' => '1975-12-05',
            'direccion' => 'Av. Ejecutivos 1500, Piso 10',
            'telefono' => '70011223',
            'profesion' => 'Magíster en Gestión Educativa',
            'foto' => 'uploads/fotos/'.time().'_ricardo.jpg',
            'created_at' => now()->subYears(3) // Fecha de ingreso hace 3 años
        ]);

        //Docente 1
        User::create(['name' => 'Gonzalo Peñaherrera', 'email' => 'gonzalo.penaherrera@educacion.gob.ec', 'password' => Hash::make('1709290207')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 8,
            'tipo' => 'docente',
            'nombres' => 'Gonzalo',
            'apellidos' => 'Peñaherrera',
            'ci' => '1709290207',
            'fecha_nacimiento' => '1967-05-24',
            'direccion' => 'Joaquín Sumaita 706 y Sebastián Arias',
            'telefono' => '2447936',
            'profesion' => 'Licenciado en Matemática y Física',
            'foto' => 'uploads/fotos/'.time().'_gonzalo.jpg',
            'created_at' => now()->subYears(23) // Fecha de ingreso hace 23 años
        ]);

        //Docente 2
        User::create(['name' => 'Jorge Piedra', 'email' => 'jorge.piedra@educacion.gob.ec', 'password' => Hash::make('2300003304')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 9,
            'tipo' => 'docente',
            'nombres' => 'Jorge',
            'apellidos' => 'Piedra',
            'ci' => '2300003304',
            'fecha_nacimiento' => '1967-05-24',
            'direccion' => 'Joaquín Sumaita 706 y Sebastián Arias',
            'telefono' => '2447936',
            'profesion' => 'Licenciado en Lengua y Literatura',
            'foto' => 'uploads/fotos/'.time().'_jorge.jpg',
            'created_at' => now()->subYears(13) // Fecha de ingreso hace 13 años
        ]);

        //Docente 3
        User::create(['name' => 'María Angulo', 'email' => 'maria.angulo@educacion.gob.ec', 'password' => Hash::make('1722083712')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 10,
            'tipo' => 'docente',
            'nombres' => 'María',
            'apellidos' => 'Angulo',
            'ci' => '1722083712',
            'fecha_nacimiento' => '1968-09-18',
            'direccion' => 'Av. Siemprevivas No. 17-67',
            'telefono' => '2414723',
            'profesion' => 'Licenciado en Ciencias Naturales',
            'foto' => 'uploads/fotos/'.time().'_maria.jpg',
            'created_at' => now()->subYears(13) // Fecha de ingreso hace 13 años
        ]);

        //Docente 4
        User::create(['name' => 'Sonia Cisneros', 'email' => 'sonia.cisneros@educacion.gob.ec', 'password' => Hash::make('1725971384')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 11,
            'tipo' => 'docente',
            'nombres' => 'Sonia',
            'apellidos' => 'Cisneros',
            'ci' => '1725971384',
            'fecha_nacimiento' => '1973-04-10',
            'direccion' => 'Calle Loja 12-74 y Av. Mariscal Sucre',
            'telefono' => '0984893415',
            'profesion' => 'Licenciado en Química y Biología',
            'foto' => 'uploads/fotos/'.time().'_sonia.jpg',
            'created_at' => now()->subYears(10) // Fecha de ingreso hace 10 años
        ]);

        //Docente 5
        User::create(['name' => 'Isabel Chicaiza', 'email' => 'isabel.cisneros@educacion.gob.ec', 'password' => Hash::make('0601949175')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 12,
            'tipo' => 'docente',
            'nombres' => 'Isabel',
            'apellidos' => 'Chicaiza',
            'ci' => '0601949175',
            'fecha_nacimiento' => '1972-11-11',
            'direccion' => 'Av. Mariscal Sucre N47-361 y Av. 24 de mayo',
            'telefono' => '0984893415',
            'profesion' => 'Licenciado en Ciencias Sociales',
            'foto' => 'uploads/fotos/'.time().'_isabel.jpg',
            'created_at' => now()->subYears(9) // Fecha de ingreso hace 9 años
        ]);

        //Docente 6
        User::create(['name' => 'Oscar Pérez', 'email' => 'oscar.perez@educacion.gob.ec', 'password' => Hash::make('1709312514')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 13,
            'tipo' => 'docente',
            'nombres' => 'Oscar',
            'apellidos' => 'Pérez',
            'ci' => '1709312514',
            'fecha_nacimiento' => '1969-12-24',
            'direccion' => 'Av. Eloy Alfaro N21-216 y Av. Gaspar de Villaroel',
            'telefono' => '0997187146',
            'profesion' => 'Magister en Ciencias de la Educación',
            'foto' => 'uploads/fotos/'.time().'_oscar.jpg',
            'created_at' => now()->subYears(17) // Fecha de ingreso hace 17 años
        ]);

        //Docente 7
        User::create(['name' => 'Pedro Cachimuel', 'email' => 'pedro.cachimuel@educacion.gob.ec', 'password' => Hash::make('2350286858')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 14,
            'tipo' => 'docente',
            'nombres' => 'Pedro',
            'apellidos' => 'Cachimuel',
            'ci' => '2350286858',
            'fecha_nacimiento' => '1967-08-21',
            'direccion' => 'Av. Gaspar de Villaroel N25-146 y Av. Japón',
            'telefono' => '0985833993',
            'profesion' => 'Magister en Emprendimiento y Gestión',
            'foto' => 'uploads/fotos/'.time().'_pedro.jpg',
            'created_at' => now()->subYears(5) // Fecha de ingreso hace 5 años
        ]);
    }
}
