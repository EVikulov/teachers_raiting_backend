<?php

use Illuminate\Database\Migrations\Migration;
use App\Repositories\RoleRepository;
use App\Models\Role;

class AddRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('app.env') != 'testing') {
            $this->createRoles();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    public function createRoles()
    {
        $roles = [
            [
                'id' => RoleRepository::ADMIN_ROLE,
                'name' => 'administrator'
            ],
            [
                'id' => RoleRepository::STUDENT_ROLE,
                'name' => 'student'
            ],
            [
                'id' => RoleRepository::TEACHER_ROLE,
                'name' => 'teacher'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}