<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Ppff;
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
            'password' => Hash::make('9876543210'),
        ])->assignRole('ADMINISTRADOR');

        Configuracion::create([
            'nombre' => 'Unidad Educativa Hilari Web',
            'descripcion' => 'Unidad Educativa para todos',
            'direccion' => 'ZONA MIRAFLORES AV 5 CALLE MEJILLOS NRO 200',
            'telefono' => '75657007 - 54646787',
            'divisa' => 'Bs',
            'correo_electronico' => 'hilariweb@gmail.com',
            'web' => 'https://hilariweb.com',
            'logo' => 'uploads/logos/4AaoUTVyDN5JebumToAnQA9V7pJeZ4OUC9eQPgIF.jpg',
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
        Nivel::create(['nombre' => 'SECUNDARIA']);

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
            'foto' => 'uploads/fotos/R7XVy5NsUAO9ZJXxuIEx21NvpQbnu85ymlQlwApA.png',
            'created_at' => now()->subYears(23) // Fecha de ingreso hace 23 años
        ]);

        //Docente 2
        User::create(['name' => 'Carlos Enríquez', 'email' => 'carlos.enriquez@educacion.gob.ec', 'password' => Hash::make('2300003304')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 9,
            'tipo' => 'docente',
            'nombres' => 'Carlos',
            'apellidos' => 'Enríquez',
            'ci' => '2300003304',
            'fecha_nacimiento' => '1967-05-24',
            'direccion' => 'Joaquín Sumaita 706 y Sebastián Arias',
            'telefono' => '2447936',
            'profesion' => 'Licenciado en Lengua y Literatura',
            'foto' => 'uploads/fotos/ermJ9iC3k4149HLy3ETawi08OeiWqIJmmIYVduJp.png',
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

        //Docente 8
        User::create(['name' => 'Nelson Mandela', 'email' => 'nelson.mandela@educacion.gob.ec', 'password' => Hash::make('4455667788')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 15,
            'tipo' => 'docente',
            'nombres' => 'Nelson',
            'apellidos' => 'Mandela',
            'ci' => '4455667788',
            'fecha_nacimiento' => '1978-09-18',
            'direccion' => 'Av. Siemprevivas N75-125 y Av. Corea',
            'telefono' => '0998754821',
            'profesion' => 'Magister en Ciencias de la Educación',
            'foto' => 'uploads/fotos/'.time().'_nelson.jpg',
            'created_at' => now()->subYears(6) // Fecha de ingreso hace 6 años
        ]);

        //Docente 9
        User::create(['name' => 'Mirian Barragán', 'email' => 'mirian.barragan@educacion.gob.ec', 'password' => Hash::make('7755224466')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 16,
            'tipo' => 'docente',
            'nombres' => 'Mirian',
            'apellidos' => 'Barragán',
            'ci' => '7755224466',
            'fecha_nacimiento' => '1978-09-18',
            'direccion' => 'Av. Insurgentes N125 y Av. Pancho Villa',
            'telefono' => '0956142277',
            'profesion' => 'Magister en Biología y Química',
            'foto' => 'uploads/fotos/'.time().'_mirian.jpg',
            'created_at' => now()->subYears(12) // Fecha de ingreso hace 12 años
        ]);

        //Docente 10
        User::create(['name' => 'Gloria Benavides', 'email' => 'gloria.benavides@educacion.gob.ec', 'password' => Hash::make('1121324365')])->assignRole('DOCENTE');
        Personal::create([
            'usuario_id' => 17,
            'tipo' => 'docente',
            'nombres' => 'Gloria',
            'apellidos' => 'Benavides',
            'ci' => '1121324365',
            'fecha_nacimiento' => '1982-05-25',
            'direccion' => 'Av. Parisina N4256 y Av. Sena',
            'telefono' => '0988662277',
            'profesion' => 'Magister en Física y Matemáticas',
            'foto' => 'uploads/fotos/'.time().'_gloria.jpg',
            'created_at' => now()->subYears(10) // Fecha de ingreso hace 10 años
        ]);

        Ppff::create(['nombres'=>'Luis Fernando','apellidos'=>'Gómez Pérez','ci'=>'11112222','fecha_nacimiento'=>'1981-06-18','telefono'=>'70112233','parentesco'=>'Padre','ocupacion'=>'Carpintero','direccion'=>'Av. Siemprevivas 125 e Insurgentes']);
        Ppff::create(['nombres'=>'María José','apellidos'=>'Vargas Ríos','ci'=>'22223333','fecha_nacimiento'=>'1983-09-22','telefono'=>'70223344','parentesco'=>'Madre','ocupacion'=>'Ama de casa','direccion'=>'Av. Gaspar de Villaroeal 576 y Av. 6 de diciembre']);
        Ppff::create(['nombres'=>'Roberto Carlos','apellidos'=>'Méndez Flores','ci'=>'33334444','fecha_nacimiento'=>'1979-03-15','telefono'=>'70334455','parentesco'=>'Tío','ocupacion'=>'Maestro constructor','direccion'=>'Av. Eloy Alfaro 877 y Av. Gaspar de Villaroel']);
        Ppff::create(['nombres'=>'Ana Patricia','apellidos'=>'Díaz Castro','ci'=>'44445555','fecha_nacimiento'=>'1982-11-30','telefono'=>'70445566','parentesco'=>'Tía','ocupacion'=>'Secretaria','direccion'=>'Av. 6 de diciembre 1024 y Av. El Inca']);
        Ppff::create(['nombres'=>'Jorge Luis','apellidos'=>'Paz Rojas','ci'=>'55556666','fecha_nacimiento'=>'1980-07-12','telefono'=>'70556677','parentesco'=>'Tutor','ocupacion'=>'Contable','direccion'=>'Joaquín Sumaita N47-354 y Av. El Inca']);
        Ppff::create(['nombres'=>'Gabriela','apellidos'=>'Torres Mendoza','ci'=>'66667777','fecha_nacimiento'=>'1985-04-25','telefono'=>'70667788','parentesco'=>'Madre','ocupacion'=>'Asistente contable','direccion'=>'Av. De Los Ríos E-125 y Av. Siemprevivas']);
        Ppff::create(['nombres'=>'Fernando','apellidos'=>'Quiroga Arce','ci'=>'77778888','fecha_nacimiento'=>'1978-12-08','telefono'=>'70778899','parentesco'=>'Padre','ocupacion'=>'Ingeniero en Sistemas','direccion'=>'De Los Tulipanes 777 y Av. Las Palmeras']);
        Ppff::create(['nombres'=>'Carolina','apellidos'=>'Romero Salazar','ci'=>'88889999','fecha_nacimiento'=>'1984-02-14','telefono'=>'70889900','parentesco'=>'Madre','ocupacion'=>'Docente Universitario','direccion'=>'Av. Simón Bolívar 4455 y Av. República de El Salvador']);
        Ppff::create(['nombres'=>'Mario','apellidos'=>'Suárez Velasco','ci'=>'99990000','fecha_nacimiento'=>'1977-08-20','telefono'=>'70990011','parentesco'=>'Tutor','ocupacion'=>'Asistente de Gerencia','direccion'=>'Av. Amazonas 2048 y Av. Colón']);
        Ppff::create(['nombres'=>'Patricia','apellidos'=>'López Herrera','ci'=>'00001111','fecha_nacimiento'=>'1986-05-17','telefono'=>'70001122','parentesco'=>'Madre','ocupacion'=>'Contable','direccion'=>'Av. Salvatierra E25-256 y Av. Insurgentes']);

        User::create(['name'=>'Josselyn Mateu','email'=>'josselyn.mateu@estudiante.com','password'=>Hash::make('1712141598')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>18,'ppff_id'=>1,'nombres'=>'Josselyn','apellidos'=>'Mateu','ci'=>'1712141598','fecha_nacimiento'=>'1991-09-16','telefono'=>'0998875412','direccion'=>'Av. Siemprevivas 125 e Insurgentes','foto'=>'uploads/fotos/estudiantes/JO6SQuwchWFvDntFyucrdoCUYoqTeWR0msjK3p0Z.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Lucía Vargas Torres','email'=>'lucia.vargas@estudiante.com','password'=>Hash::make('4455667')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>19,'ppff_id'=>2,'nombres'=>'Lucía','apellidos'=>'Vargas Torres','ci'=>'4455667','fecha_nacimiento'=>'2010-05-28','telefono'=>'22223333','direccion'=>'Av. Gaspar de Villaroeal 576 y Av. 6 de diciembre','foto'=>'uploads/fotos/estudiantes/'.time().'_lucia.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Josselyn Laso','email'=>'josselyn.laso@estudiante.com','password'=>Hash::make('2300003304')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>20,'ppff_id'=>3,'nombres'=>'Josselyn','apellidos'=>'Laso','ci'=>'2300003304','fecha_nacimiento'=>'2010-03-07','telefono'=>'0987010482','direccion'=>'Av. Gaspar de Villaroeal 576 y Av. 6 de diciembre','foto'=>'uploads/fotos/estudiantes/lnU965OxKashx67d1vKXIrCIOrhxvjszfswWO0Bw.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Jonathan Casagallo Muenala','email'=>'jonathan.casagallo@estudiante.com','password'=>Hash::make('1725971384')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>21,'ppff_id'=>4,'nombres'=>'Jonathan','apellidos'=>'Casagallo Muenala','ci'=>'1725971384','fecha_nacimiento'=>'2010-10-24','telefono'=>'0985557138','direccion'=>'Jose Felix Bareiro Y Nogales','foto'=>'uploads/fotos/estudiantes/'.time().'_fernando.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Gabriela Cayambe Chicaiza','email'=>'gabriela.cayambe@estudiante.com','password'=>Hash::make('1722083712')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>22,'ppff_id'=>5,'nombres'=>'Gabriela','apellidos'=>'Cayambe Chicaiza','ci'=>'1722083712','fecha_nacimiento'=>'2010-08-25','telefono'=>'0999088267','direccion'=>'Calle Sn Bolívar Y Ambato','foto'=>'uploads/fotos/estudiantes/'.time().'_gabriela.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Octavio Chicaiza Anasicha','email'=>'octavio.chicaiza@estudiante.com','password'=>Hash::make('0601949175')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>23,'ppff_id'=>6,'nombres'=>'Octavio','apellidos'=>'Chicaiza Anasicha','ci'=>'0601949175','fecha_nacimiento'=>'2010-12-09','telefono'=>'0987010482','direccion'=>'Las Palmeras','foto'=>'uploads/fotos/estudiantes/'.time().'_octavio.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Luis Chipantasi Collaguazo','email'=>'luis.chipantasi@estudiante.com','password'=>Hash::make('1712013752')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>24,'ppff_id'=>7,'nombres'=>'Liliana','apellidos'=>'Chipantasi Collaguazo','ci'=>'1712013752','fecha_nacimiento'=>'2007-01-08','telefono'=>'0961945005','direccion'=>'Isla Isabela Y 6 De Diciembre','foto'=>'uploads/fotos/estudiantes/'.time().'_luis.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Erick Chuquin Perugachi','email'=>'erick.chuquin@estudiante.com','password'=>Hash::make('1721686630')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>25,'ppff_id'=>8,'nombres'=>'Erick','apellidos'=>'Chuquin Perugachi','ci'=>'1721686630','fecha_nacimiento'=>'2007-03-07','telefono'=>'0987010482','direccion'=>'CUENCA N375 Y CARCHI','foto'=>'uploads/fotos/estudiantes/'.time().'_erick.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Walter Cuero Macias','email'=>'walter.cuero@estudiante.com','password'=>Hash::make('2350286858')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>26,'ppff_id'=>9,'nombres'=>'Walter','apellidos'=>'Cuero Macias','ci'=>'2350286858','fecha_nacimiento'=>'2007-10-21','telefono'=>'0985833993','direccion'=>'Nuestra Señora De Santa Ana','foto'=>'uploads/fotos/estudiantes/'.time().'_walter.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Cecilia Garzón Maigua','email'=>'cecilia.garzon@estudiante.com','password'=>Hash::make('1003244090')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>27,'ppff_id'=>10,'nombres'=>'Cecilia','apellidos'=>'Garzón Maigua','ci'=>'1003244090','fecha_nacimiento'=>'2007-02-28','telefono'=>'0987270773','direccion'=>'La Calera','foto'=>'uploads/fotos/estudiantes/'.time().'_cecilia.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Arturo Lisboa Montenegro','email'=>'arturo.lisboa@estudiante.com','password'=>Hash::make('33014530')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>28,'ppff_id'=>1,'nombres'=>'Arturo','apellidos'=>'Lisboa Montenegro','ci'=>'33014530','fecha_nacimiento'=>'2007-05-09','telefono'=>'0958826530','direccion'=>'Calle San Carlos Y Av. La Prensa','foto'=>'uploads/fotos/estudiantes/'.time().'_arturo.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Wilfrido López Narvaez','email'=>'wilfrido.lopez.narvaez@estudiante.com','password'=>Hash::make('1723655781')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>29,'ppff_id'=>2,'nombres'=>'Wilfrido','apellidos'=>'López Narvaez','ci'=>'1723655781','fecha_nacimiento'=>'2007-08-07','telefono'=>'0984981640','direccion'=>'Domingo Segura Y Bellavista','foto'=>'uploads/fotos/estudiantes/'.time().'_wilfrido.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Noemi Aguilar Chica','email'=>'noemi.aguilar.chica@estudiante.com','password'=>Hash::make('1728853431')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>30,'ppff_id'=>3,'nombres'=>'Noemi','apellidos'=>'Aguilar Chica','ci'=>'1728853431','fecha_nacimiento'=>'2007-10-11','telefono'=>'0985863405','direccion'=>'Condado Alto','foto'=>'uploads/fotos/estudiantes/'.time().'_noemi.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Aurora Amaguaña Quilca','email'=>'aurora.amaguana.quilca@estudiante.com','password'=>Hash::make('1002577250')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>31,'ppff_id'=>4,'nombres'=>'Aurora','apellidos'=>'Amaguaña Quilca','ci'=>'1002577250','fecha_nacimiento'=>'2007-03-29','telefono'=>'0999975963','direccion'=>'Avenida Nogales Barrio San Felipe','foto'=>'uploads/fotos/estudiantes/'.time().'_aurora.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Carmen Anguisaca Roche','email'=>'carmen.anguisaca@estudiante.com','password'=>Hash::make('0103027033')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>32,'ppff_id'=>5,'nombres'=>'Carmen','apellidos'=>'Anguisaca Roche','ci'=>'0103027033','fecha_nacimiento'=>'2007-11-05','telefono'=>'0998940639','direccion'=>'Pasaje Galarza Y Esmeraldas','foto'=>'uploads/fotos/estudiantes/'.time().'_carmen.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Lucía Arévalo Zhiñin','email'=>'lucia.arevalo@estudiante.com','password'=>Hash::make('1714740725')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>33,'ppff_id'=>6,'nombres'=>'Lucía','apellidos'=>'Arévalo Zhiñin','ci'=>'1714740725','fecha_nacimiento'=>'2007-08-01','telefono'=>'0963769847','direccion'=>'José Bustamante E7-52 El Morlan','foto'=>'uploads/fotos/estudiantes/'.time().'_lucia.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Miguel Basurto Cheme','email'=>'miguel.basurto@estudiante.com','password'=>Hash::make('1723089965')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>34,'ppff_id'=>7,'nombres'=>'Miguel','apellidos'=>'Basurto Cheme','ci'=>'1723089965','fecha_nacimiento'=>'2007-01-24','telefono'=>'0987300396','direccion'=>'Burgeos Y Rumipamba','foto'=>'uploads/fotos/estudiantes/'.time().'_miguel.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Anthony Smith Cadena Viracucha','email'=>'anthony.cadena.viracucha@estudiante.com','password'=>Hash::make('1753238409')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>35,'ppff_id'=>8,'nombres'=>'Anthony Smith','apellidos'=>'Cadena Viracucha','ci'=>'1753238409','fecha_nacimiento'=>'2007-10-27','telefono'=>'0982918705','direccion'=>'6 De Diciembre Y Cucardas','foto'=>'uploads/fotos/estudiantes/'.time().'_anthony.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Angel Caisalitin Criollo','email'=>'angel.caisalitin.criollo@estudiante.com','password'=>Hash::make('1727832725')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>36,'ppff_id'=>9,'nombres'=>'Angel','apellidos'=>'Caisalitin Criollo','ci'=>'1727832725','fecha_nacimiento'=>'2007-01-29','telefono'=>'0980963659','direccion'=>'Buenos Aires Y Jose Feliz Barreiro','foto'=>'uploads/fotos/estudiantes/'.time().'_angel.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Daniel Pillajo Quishpe','email'=>'daniel.Pillajo.quishpe@estudiante.com','password'=>Hash::make('1724372956')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>37,'ppff_id'=>10,'nombres'=>'Daniel','apellidos'=>'Pillajo Quishpe','ci'=>'1724372956','fecha_nacimiento'=>'2007-05-24','telefono'=>'0993121061','direccion'=>'AMAGASI DEL INCA','foto'=>'uploads/fotos/estudiantes/'.time().'_daniel.jpg','genero'=>'masculino','estado'=>'activo']);

        User::create(['name'=>'Margarita Albarracin Agurto','email'=>'margarita.albarracin@estudiante.com','password'=>Hash::make('0703507855')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>38,'ppff_id'=>1,'nombres'=>'Margarita','apellidos'=>'Albarracin Agurto','ci'=>'0703507855','fecha_nacimiento'=>'2007-12-09','telefono'=>'0995330281','direccion'=>'San Isidro Del Inca Olivos Y Minas N 48-208','foto'=>'uploads/fotos/estudiantes/'.time().'_margarita.jpg','genero'=>'femenino','estado'=>'activo']);

        User::create(['name'=>'Mauricio Aluisa Gomez','email'=>'mauricio.aluisa@estudiante.com','password'=>Hash::make('1711307189')])->assignRole('ESTUDIANTE');
        Estudiante::create(['usuario_id'=>39,'ppff_id'=>3,'nombres'=>'Mauricio','apellidos'=>'Aluisa Gomez','ci'=>'1711307189','fecha_nacimiento'=>'2007-08-03','telefono'=>'0987010482','direccion'=>'Carcelen Leonardo Freiré N 81-183 Y Jaime Roldos','foto'=>'uploads/fotos/estudiantes/'.time().'_mauricio.jpg','genero'=>'masculino','estado'=>'activo']);

        Matriculacion::create(['estudiante_id' => 1, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 2, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 3, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 4, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 5, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 6, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 7, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 8, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 9, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 10, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 11, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 12, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 13, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 14, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 15, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 16, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 17, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 18, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 19, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);
        Matriculacion::create(['estudiante_id' => 20, 'turno_id' => 1, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'fecha_matriculacion' => '2025-01-15']);

        Asignacion::create(['personal_id' => 7, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'materia_id' => 14, 'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
        Asignacion::create(['personal_id' => 8, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 9, 'paralelo_id' => 9, 'materia_id' => 13, 'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
        Asignacion::create(['personal_id' => 8, 'gestion_id' => 3, 'nivel_id' => 3, 'grado_id' => 10, 'paralelo_id' => 10, 'materia_id' => 13, 'turno_id' => 1, 'fecha_asignacion' => '2025-01-15']);
    }
}
