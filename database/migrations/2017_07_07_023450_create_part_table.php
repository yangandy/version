<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts',function(Blueprint $table){
            $table->engine='InnoDB';
            $table->integer('id');
            $table->string('name');
            $table->string('version');
            $table->string('configpath');
            $table->string('auth');
            $table->string('logpath');
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
