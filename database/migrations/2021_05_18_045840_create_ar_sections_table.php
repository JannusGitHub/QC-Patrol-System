<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ar_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('audit_result_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->tinyInteger('status');
            $table->timestamps();

            // Foreign key
            $table->foreign('audit_result_id')->references('id')->on('audit_results');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_sections');
    }
}
