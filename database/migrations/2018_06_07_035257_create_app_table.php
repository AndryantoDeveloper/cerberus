<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->enum('gender', ["MALE","FEMALE"]);
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';  
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
