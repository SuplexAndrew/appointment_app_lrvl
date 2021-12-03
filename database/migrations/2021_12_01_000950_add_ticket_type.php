<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketType extends Migration
{
    public function up()
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
            $table->timestamp('created_at')->nullable(false)->useCurrent();
        });
    }
    public function down()
    {
        Schema::drop('ticket_types');
    }
}
