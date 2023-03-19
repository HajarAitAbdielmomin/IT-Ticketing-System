<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('topic_ticket');
            $table->string('file_description')->nullable();
            $table->timestamp('create_date');
            $table->timestamp('reopened_date')->nullable();
            $table->timestamp('closed_date')->nullable();
            $table->foreignId('closedby')->nullable()->references('id')->on('user')->nullOnDelete();
            $table->foreignId('id_creator')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('status')->nullable()->references('id')->on('ticket_status')->nullOnDelete();
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
        Schema::dropIfExists('ticket');
    }
}
