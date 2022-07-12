<?php

use App\Models\ClearLoginAdmin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClearLoginUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clear_login_users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('surname', 80)->nullable(false);
            $table->char('name', 80)->nullable(false);
            $table->char('second_name', 80)->nullable(true);
            $table->char('login')->unique();
            $table->char('password');
            $table->timestamps();
        });

        $admin = new ClearLoginAdmin;
        $admin->login = 'admin';
        $admin->password = 'admin';
        $admin->surname = 'Админ';
        $admin->name = 'Админ';
        $admin->second_name = 'Админ';
        $admin->save();
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
