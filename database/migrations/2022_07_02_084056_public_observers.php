<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublicObservers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_observers', function (Blueprint $table){
            $table->increments('id');
            $table->char('email', 255)->nullable(false)->unique('email');
            $table->char('password', 255)->nullable(false);
            $table->char('remember_token', 100)->nullable(true);
            $table->char('surname', 80)->nullable(false);
            $table->char('name', 80)->nullable(false);
            $table->char('second_name', 80)->nullable(true);
            $table->unsignedSmallInteger('id_municipality')->nullable(false);
            $table->char('category_gia', 6)->nullable(false);
            $table->timestamps();

            $table->foreign('id_municipality')->references('id_municipality')->on('municipalities');
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
