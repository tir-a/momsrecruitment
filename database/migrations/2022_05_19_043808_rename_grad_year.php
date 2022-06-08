<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGradYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Educations', function (Blueprint $table) {
            $table->renameColumn('grad_year', 'grad_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Educations', function (Blueprint $table) {
            $table->renameColumn('grad_date', 'grad_year');
        });
    }
}
