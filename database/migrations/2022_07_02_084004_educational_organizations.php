<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EducationalOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_organizations', function (Blueprint $table){
            $table->smallIncrements('id_education_org');
            $table->char('name_education_org', 255)->nullable(false);
            $table->unsignedSmallInteger('id_municipality')->nullable(false);
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
