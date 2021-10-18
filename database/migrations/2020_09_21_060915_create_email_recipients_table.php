<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('section_id');
            $table->integer('receiver');
            $table->integer('address_type'); //1 = attention , 2 = CC
            $table->integer('email_recipient_stat');
            $table->integer('created_by');
            $table->timestamps();
        });

        // Foreign key
        // $table->foreign('section_id')->references('id')->on('sections');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_recipients');
    }
}
