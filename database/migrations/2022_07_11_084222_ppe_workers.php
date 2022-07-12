<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PpeWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppe_workers', function (Blueprint $table){
            $table->increments('id');

            $table->char('surname', 80)->nullable(false);
            $table->char('name', 80)->nullable(false);
            $table->char('second_name', 80)->nullable(true);

            $table->unsignedSmallInteger('id_municipality')->nullable(false);
            $table->unsignedSmallInteger('id_education_org')->nullable(false);

            $table->char('other_place_of_work', 255)->nullable(false);
            $table->char('position', 150)->nullable(false);

            $table->foreign('id')->references('id')->on('login_users');
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
