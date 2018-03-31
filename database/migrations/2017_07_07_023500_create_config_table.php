<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('configs',function(Blueprint $table){
            $table->engine='InnoDB';
            $table->integer('id');
            $table->integer('pid');
            $table->string('type');
            $table->string('name');
            $table->string('version');
            $table->string('auth');
            $table->timestamps();
        });
        //
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
