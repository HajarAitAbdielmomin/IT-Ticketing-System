<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ticket')->references('id')->on('ticket')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_Rep')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');    
            $table->foreignId('id_Creator')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('messageRep')->nullable();
            $table->string('messageCli')->nullable();
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
        Schema::dropIfExists('ticket_replies');
    }
}
