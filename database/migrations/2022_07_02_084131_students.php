<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table){
            $table->increments('id');
            $table->char('surname', 80)->nullable(false);
            $table->char('name', 80)->nullable(false);
            $table->char('second_name', 80)->nullable(true);
            $table->unsignedSmallInteger('id_municipality')->nullable(false);
            $table->unsignedSmallInteger('id_education_org')->nullable(false);
            $table->tinyInteger('class')->nullable(false);

            $table->foreign('id_municipality')->references('id_municipality')->on('municipalities');
            $table->foreign('id_education_org')->references('id_education_org')->on('education_organizations');
            $table->timestamps();
        });
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
}
