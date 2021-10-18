<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_findings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no');
            $table->unsignedBigInteger('audit_result_id');
            $table->unsignedBigInteger('classification_id');
            $table->string('station');
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('factor_item_list_id');
            $table->string('actual_illustration');
            $table->string('actual_illustration_orig');
            $table->text('counter_measures')->nullable();
            $table->date('commitment_date')->nullable();
            $table->text('close_out')->nullable();
            $table->string('close_out_image')->nullable();
            $table->string('close_out_image_orig')->nullable();

            $table->tinyInteger('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->integer('update_version');
            $table->timestamps();

            // Foreign key
            $table->foreign('audit_result_id')->references('id')->on('audit_results');
            $table->foreign('classification_id')->references('id')->on('classifications');
            $table->foreign('factor_id')->references('id')->on('factors');
            $table->foreign('factor_item_list_id')->references('id')->on('factor_item_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_findings');
    }
}
