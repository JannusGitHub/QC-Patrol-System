<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('audit_result_id');
            $table->string('orig_filename');
            $table->string('filename');
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
        Schema::dropIfExists('ar_attachments');
    }
}
