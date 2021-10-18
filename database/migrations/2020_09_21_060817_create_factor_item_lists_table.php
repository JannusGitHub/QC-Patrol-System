<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorItemListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_item_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('layer');
            $table->string('name');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->timestamps();

            // Foreign key
            $table->foreign('factor_id')->references('id')->on('factors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factor_item_lists');
    }
}
