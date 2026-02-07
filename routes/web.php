<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculacionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PpffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// Rutas para la configuración del sistema
Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth','can:admin.configuracion.index');
Route::post('/admin/configuracion/create', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth','can:admin.configuracion.store');

// rutas para las gestiones del sistema
Route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth','can:admin.gestiones.index');
Route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth','can:admin.gestiones.create');
Route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth','can:admin.gestiones.store');
Route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth','can:admin.gestiones.edit');
Route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth','can:admin.gestiones.update');
Route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth','can:admin.gestiones.destroy');

// rutas para los periodos del sistema
Route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth','can:admin.periodos.index');
Route::post('/admin/periodos/create', [PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth','can:admin.periodos.store');
Route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth','can:admin.periodos.update');
Route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth','can:admin.periodos.destroy');

// rutas para los niveles del sistema
Route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth','can:admin.niveles.index');
Route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth','can:admin.niveles.store');
Route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth','can:admin.niveles.update');
Route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth','can:admin.niveles.destroy');

// rutas para los grados del sistema
Route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index')->middleware('auth','can:admin.grados.index');
Route::post('/admin/grados/create', [GradoController::class, 'store'])->name('admin.grados.store')->middleware('auth','can:admin.grados.store');
Route::put('/admin/grados/{id}', [GradoController::class, 'update'])->name('admin.grados.update')->middleware('auth','can:admin.grados.update');
Route::delete('/admin/grados/{id}', [GradoController::class, 'destroy'])->name('admin.grados.destroy')->middleware('auth','can:admin.grados.destroy');

// rutas para los paralelos del sistema
Route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth','can:admin.paralelos.index');
Route::post('/admin/paralelos/create', [ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth','can:admin.paralelos.store');
Route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth','can:admin.paralelos.update');
Route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth','can:admin.paralelos.destroy');

// rutas para los turnos del sistema
Route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth','can:admin.turnos.index');
Route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth','can:admin.turnos.create');
Route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth','can:admin.turnos.store');
Route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth','can:admin.turnos.edit');
Route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth','can:admin.turnos.update');
Route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth','can:admin.turnos.destroy');

// rutas para las materias del sistema
Route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth','can:admin.materias.index');
Route::post('/admin/materias/create', [MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth','can:admin.materias.store');
Route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth','can:admin.materias.update');
Route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth','can:admin.materias.destroy');

// rutas para los roles del sistema
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth','can:admin.roles.index');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth','can:admin.roles.create');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth','can:admin.roles.store');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth','can:admin.roles.edit');
Route::get('/admin/roles/{id}/permisos', [RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('auth','can:admin.roles.permisos');
Route::post('/admin/roles/{id}', [RoleController::class, 'update_permisos'])->name('admin.roles.update_permisos')->middleware('auth','can:admin.roles.update_permisos');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth','can:admin.roles.update');
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth','can:admin.roles.destroy');

// rutas para el personal del sistema
Route::get('/admin/personal/{tipo}', [PersonalController::class, 'index'])->name('admin.personal.index')->middleware('auth','can:admin.personal.index');
Route::get('/admin/personal/create/{tipo}', [PersonalController::class, 'create'])->name('admin.personal.create')->middleware('auth','can:admin.personal.create');
Route::post('/admin/personal/create', [PersonalController::class, 'store'])->name('admin.personal.store')->middleware('auth','can:admin.personal.store');
Route::get('/admin/personal/show/{id}', [PersonalController::class, 'show'])->name('admin.personal.show')->middleware('auth','can:admin.personal.show');
Route::get('/admin/personal/{id}/edit', [PersonalController::class, 'edit'])->name('admin.personal.edit')->middleware('auth','can:admin.personal.edit');
Route::put('/admin/personal/{id}', [PersonalController::class, 'update'])->name('admin.personal.update')->middleware('auth','can:admin.personal.update');
Route::delete('/admin/personal/{id}', [PersonalController::class, 'destroy'])->name('admin.personal.destroy')->middleware('auth','can:admin.personal.destroy');

// rutas para la formación del personal
Route::get('/admin/personal/{id}/formaciones', [FormacionController::class, 'index'])->name('admin.formaciones.index')->middleware('auth','can:admin.formaciones.index');
Route::get('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'create'])->name('admin.formaciones.create')->middleware('auth','can:admin.formaciones.create');
Route::post('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'store'])->name('admin.formaciones.store')->middleware('auth','can:admin.formaciones.store');
Route::get('/admin/personal/formaciones/{id}', [FormacionController::class, 'edit'])->name('admin.formaciones.edit')->middleware('auth','can:admin.formaciones.edit');
Route::put('/admin/personal/formaciones/{id}', [FormacionController::class, 'update'])->name('admin.formaciones.update')->middleware('auth','can:admin.formaciones.update');
Route::delete('/admin/personal/formaciones/{id}', [FormacionController::class, 'destroy'])->name('admin.formaciones.destroy')->middleware('auth','can:admin.formaciones.destroy');

// rutas para los estudiantes del sistema
Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('auth','can:admin.estudiantes.index');
Route::get('/admin/estudiantes/create', [EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('auth','can:admin.estudiantes.create');
Route::post('/admin/estudiantes/create', [EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('auth','can:admin.estudiantes.store');
Route::get('/admin/estudiantes/{id}', [EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('auth','can:admin.estudiantes.show');
Route::get('/admin/estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('auth','can:admin.estudiantes.edit');
Route::put('/admin/estudiantes/{id}', [EstudianteController::class, 'update'])->name('admin.estudiantes.update')->middleware('auth','can:admin.estudiantes.update');
Route::delete('/admin/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy')->middleware('auth','can:admin.estudiantes.destroy');

// ruta para obtener al padre de familia del estudiante
Route::post('/admin/estudiantes/obtenerPPFF', [EstudianteController::class, 'get_ppff'])->name('admin.estudiantes.obtenerPPFF')->middleware('auth','can:admin.estudiantes.obtenerPPFF');

// ruta para padres de familia del estudiante
Route::get('/admin/ppffs', [PpffController::class, 'index'])->name('admin.ppffs.index')->middleware('auth','can:admin.ppffs.index');
Route::post('/admin/estudiantes/ppff/create', [PpffController::class, 'store'])->name('admin.estudiantes.ppffs.store')->middleware('auth','can:admin.estudiantes.ppffs.store');
Route::get('/admin/ppffs/create', [PpffController::class, 'create'])->name('admin.ppffs.create')->middleware('auth','can:admin.ppffs.create');
Route::post('/admin/ppffs/create', [PpffController::class, 'store'])->name('admin.ppffs.store')->middleware('auth','can:admin.ppffs.store');
Route::get('/admin/ppffs/{id}', [PpffController::class, 'show'])->name('admin.ppffs.show')->middleware('auth','can:admin.ppffs.show');

// rutas para las matriculaciones del sistema
Route::get('/admin/matriculaciones', [MatriculacionController::class, 'index'])->name('admin.matriculaciones.index')->middleware('auth','can:admin.matriculaciones.index');
Route::get('/admin/matriculaciones/create', [MatriculacionController::class, 'create'])->name('admin.matriculaciones.create')->middleware('auth','can:admin.matriculaciones.create');
Route::post('/admin/matriculaciones/create', [MatriculacionController::class, 'store'])->name('admin.matriculaciones.store')->middleware('auth','can:admin.matriculaciones.store');
Route::get('/admin/matriculaciones/{id}', [MatriculacionController::class, 'show'])->name('admin.matriculaciones.show')->middleware('auth','can:admin.matriculaciones.show');
Route::get('/admin/matriculaciones/{id}/edit', [MatriculacionController::class, 'edit'])->name('admin.matriculaciones.edit')->middleware('auth','can:admin.matriculaciones.edit');
Route::put('/admin/matriculaciones/{id}', [MatriculacionController::class, 'update'])->name('admin.matriculaciones.update')->middleware('auth','can:admin.matriculaciones.update');
Route::delete('/admin/matriculaciones/{id}', [MatriculacionController::class, 'destroy'])->name('admin.matriculaciones.destroy')->middleware('auth','can:admin.matriculaciones.destroy');
Route::get('/admin/matriculaciones/buscar_estudiante/{id}', [MatriculacionController::class, 'buscar_estudiante'])->name('admin.matriculaciones.buscar_estudiante')->middleware('auth','can:admin.matriculaciones.buscar_estudiante');
Route::get('/admin/matriculaciones/buscar_grado/{id}', [MatriculacionController::class, 'buscar_grados'])->name('admin.matriculaciones.buscar_grados')->middleware('auth','can:admin.matriculaciones.buscar_grados');
Route::get('/admin/matriculaciones/buscar_paralelo/{id}', [MatriculacionController::class, 'buscar_paralelos'])->name('admin.matriculaciones.buscar_paralelos')->middleware('auth','can:admin.matriculaciones.buscar_paralelos');
Route::get('/admin/matriculaciones/pdf/{id}', [MatriculacionController::class, 'pdf_matricula'])->name('admin.matriculaciones.pdf_matricula')->middleware('auth','can:admin.matriculaciones.pdf_matricula');

// rutas para asignación de materias de los docentes
Route::get('/admin/asignaciones', [AsignacionController::class, 'index'])->name('admin.asignaciones.index')->middleware('auth','can:admin.asignaciones.index');
Route::get('/admin/asignaciones/create', [AsignacionController::class, 'create'])->name('admin.asignaciones.create')->middleware('auth','can:admin.asignaciones.create');
Route::post('/admin/asignaciones/create', [AsignacionController::class, 'store'])->name('admin.asignaciones.store')->middleware('auth','can:admin.asignaciones.store');
Route::get('/admin/asignaciones/buscar_docente/{id}', [AsignacionController::class, 'buscar_docente'])->name('admin.asignaciones.buscar_docente')->middleware('auth','can:admin.asignaciones.buscar_docente');
Route::get('/admin/asignaciones/{id}', [AsignacionController::class, 'show'])->name('admin.asignaciones.show')->middleware('auth','can:admin.asignaciones.show');
Route::get('/admin/asignaciones/{id}/edit', [AsignacionController::class, 'edit'])->name('admin.asignaciones.edit')->middleware('auth','can:admin.asignaciones.edit');
Route::put('/admin/asignaciones/{id}', [AsignacionController::class, 'update'])->name('admin.asignaciones.update')->middleware('auth','can:admin.asignaciones.update');
Route::delete('/admin/asignaciones/{id}', [AsignacionController::class, 'destroy'])->name('admin.asignaciones.destroy')->middleware('auth','can:admin.asignaciones.destroy');

// rutas para pagos
Route::get('/admin/pagos', [PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth','can:admin.pagos.index');
Route::get('/admin/pagos/estudiante/{id}', [PagoController::class, 'ver_pagos'])->name('admin.pagos.ver_pagos')->middleware('auth','can:admin.pagos.ver_pagos');
Route::post('/admin/pagos/create', [PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth','can:admin.pagos.store');
Route::get('/admin/pagos/{id}/comprobante', [PagoController::class, 'comprobante'])->name('admin.pagos.comprobante')->middleware('auth','can:admin.pagos.comprobante');
Route::delete('/admin/pagos/{id}', [PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth','can:admin.pagos.destroy');

// rutas para asistencias del estudiante
Route::get('/admin/asistencias', [AsistenciaController::class, 'index'])->name('admin.asistencias.index')->middleware('auth','can:admin.asistencias.index');
Route::get('/admin/asistencias/create/asignacion/{id}', [AsistenciaController::class, 'create'])->name('admin.asistencias.create')->middleware('auth','can:admin.asistencias.create');
Route::get('/admin/asistencias/asignacion/{id}', [AsistenciaController::class, 'show'])->name('admin.asistencias.show')->middleware('auth');
Route::post('/admin/asistencias/create', [AsistenciaController::class, 'store'])->name('admin.asistencias.store')->middleware('auth','can:admin.asistencias.store');
Route::put('/admin/asistencias/{id}', [AsistenciaController::class, 'update'])->name('admin.asistencias.update')->middleware('auth');
Route::delete('/admin/asistencias/{id}', [AsistenciaController::class, 'destroy'])->name('admin.asistencias.destroy')->middleware('auth');
