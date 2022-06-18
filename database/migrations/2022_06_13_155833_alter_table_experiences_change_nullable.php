<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableExperiencesChangeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Experiences', function (Blueprint $table) {
            $table->string('job')->nullable()->change();
            $table->string('job_level')->nullable()->change();
            $table->string('specialization')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->date('date_joined')->nullable()->change();
            $table->string('working_year')->nullable()->change();
            $table->string('detail')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Experiences', function (Blueprint $table) {
            //
        });
    }
}
