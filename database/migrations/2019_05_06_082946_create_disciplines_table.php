<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use RonasIT\Support\Traits\MigrationTrait;

class CreateDisciplinesTable extends Migration
{
    use MigrationTrait;

    public function up()
    {
        DB::beginTransaction();

        $this->createTable();

        DB::commit();
    }

    public function down()
    {
        DB::beginTransaction();

        Schema::drop('disciplines');

        DB::commit();
    }

    public function createTable()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
            $table->integer('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
        });
    }
}