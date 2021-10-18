<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArEmailRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_email_recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('audit_result_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('type')->comment = '1=Attention, 2=CC';
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->tinyInteger('status');
            $table->timestamps();

            // Foreign key
            $table->foreign('audit_result_id')->references('id')->on('audit_results');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_email_recipients');
    }
}
