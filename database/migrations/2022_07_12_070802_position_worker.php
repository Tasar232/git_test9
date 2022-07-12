<?php

use App\Models\Position_worker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PositionWorker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_workers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 255)->nullable(false);
            $table->timestamps();
        });

        $positions = [
            'Руководитель ППЭ / Член ГЭК',
            'Технический специалист',
            'Организатор ППЭ',
            'Общественный наблюдатель'
        ];

        foreach ($positions as $pos) {
            $position = new Position_worker;
            $position->name = $pos;
            $position->save();
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
