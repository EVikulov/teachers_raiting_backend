<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use RonasIT\Support\Traits\MigrationTrait;

class CreateQuestionnairesTable extends Migration
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

        Schema::drop('questionnaires');

        DB::commit();
    }

    public function createTable()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('rate');
        });
    }
}