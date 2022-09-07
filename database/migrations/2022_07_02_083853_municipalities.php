<?php

use App\Models\Municipality;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipalities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table){
            $table->smallIncrements('id_municipality');
            $table->char('name_municipality', 255)->nullable(false);
            $table->timestamps();
        });
        $test_mo = ["Тест МО 1", "Тест МО 2", "Тест МО 3", "Тест МО 4"];
        foreach($test_mo as $mo){
            $mun = new Municipality;
            $mun->name_municipality = $mo;
        }
        
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
