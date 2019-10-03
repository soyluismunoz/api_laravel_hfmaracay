<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('iso2', 2);
            $table->char('iso3', 3);
            $table->smallInteger('prefix');
            $table->string('name');
            $table->string('continent');
            $table->string('subcontinent')->nullable();
            $table->char('iso_currency', 3)->nullable();
            $table->string('name_currency')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
