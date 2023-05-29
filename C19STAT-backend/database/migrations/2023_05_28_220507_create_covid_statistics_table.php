<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidStatisticsTable extends Migration
{
    public function up()
    {
        Schema::create('covid_statistics', function (Blueprint $table) {
            $table->id();
            $table->date('update_date');
            $table->integer('local_new_cases');
            $table->integer('local_active_cases');
            $table->integer('local_total_cases');
            $table->integer('local_deaths');
            $table->integer('local_recovered');
            $table->integer('local_total_individuals_in_hospitals');
            $table->integer('global_new_cases');
            $table->integer('global_total_cases');
            $table->integer('global_deaths');
            $table->integer('global_new_deaths');
            $table->integer('global_recovered');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('covid_statistics');
    }
}
