<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArfInChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arf_in_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ar_finding_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->tinyInteger('status');
            $table->timestamps();

            // Foreign key
            $table->foreign('ar_finding_id')->references('id')->on('ar_findings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arf_in_charges');
    }
}
