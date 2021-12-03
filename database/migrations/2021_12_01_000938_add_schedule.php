<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchedule extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->nullable(false);
            $table->integer('size')->default(3);
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
            $table->timestamp('created_at')->nullable(false)->useCurrent();
        });
    }
    public function down()
    {
        Schema::drop('schedules');
    }
}
