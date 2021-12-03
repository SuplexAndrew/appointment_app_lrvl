<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointments extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('time_id')->nullable(false);
            $table->string('company')->nullable(true);
            $table->json('contacts');
            $table->integer('ticket_type_id');
            $table->integer('count_si');
            $table->json('account_numbers');
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
            $table->timestamp('created_at')->nullable(false)->useCurrent();

            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
            $table->foreign('time_id')->references('id')->on('schedules');
        });
    }
    public function down()
    {
        Schema::drop('appointments');
    }
}
