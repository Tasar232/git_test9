<?php

use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table){
            $table->smallIncrements('id_subject');
            $table->char('subject_name', 17)->nullable(false);
            $table->timestamps();
        });
        $subjects = [
            'Русский язык', 
            'Математика', 
            'Физика', 
            'Химия', 
            'Информатика', 
            'Биология', 
            'История', 
            'География', 
            'Английский язык', 
            'Немецкий язык', 
            'Французский язык', 
            'Обществознание', 
            'Литература'
        ];

        foreach ($subjects as $sub){
            $subject = new Subject;
            $subject->subject_name = $sub;
            $subject->save();
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
