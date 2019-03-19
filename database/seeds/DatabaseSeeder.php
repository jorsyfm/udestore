<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\User;
use App\Student;
use App\Teacher;
use App\Level;
use App\Category;
use App\Course;
use App\Goal;
use App\Requirement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');


        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');

        // Crear 3 roles
        factory(Role::class, 1)->create(['name' => 'admin']);
        factory(Role::class, 1)->create(['name' => 'teacher']);
        factory(Role::class, 1)->create(['name' => 'student']);

        // Crear 1 administrador
        factory(User::class, 1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => Role::ADMIN
        ])
        ->each(function (User $u){ // Dandole valor a Student, en Factory se definió como null
            factory(Student::class, 1)->create(['user_id' => $u->id]);
        });

        // Crear 50 usuarios (estudiantes)
        factory(User::class, 50)->create()
            ->each(function (User $u){ // Para cada usuario se crea un estudiante relacionado
                factory(Student::class, 1)->create(['user_id' => $u->id]);
            });

        // Crear 10 usuarios (profesores)
        factory(User::class, 10)->create()
            ->each(function (User $u) { // Para cada usuario se crea un estudiante y profesor relacionado
                factory(Student::class, 1)->create(['user_id' => $u->id]);
                factory(Teacher::class, 1)->create(['user_id' => $u->id]);
            });

        // Crear 3 niveles de usuarios(Básico, Intermedio, Avanzado)
        factory(Level::class, 1)->create(['name' => 'Beginner']);
        factory(Level::class, 1)->create(['name' => 'Intermediate']);
        factory(Level::class, 1)->create(['name' => 'Advanced']);

        // Crear 5 categorías
        factory(Category::class, 5)->create();

        // Crear cursos
        factory(Course::class, 50)
            ->create()
            ->each(function (Course $c){ // Para cada curso se van a crear 2 metas (goals) y 4 requisitos
               $c->goals()->saveMany(factory(Goal::class, 2)->create());
               $c->goals()->saveMany(factory(Requirement::class, 4)->create());
            });
    }
}
