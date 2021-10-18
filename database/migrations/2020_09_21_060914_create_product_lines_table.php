<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('department')->comment = "1=TS,2=PPS,3=CN,4=YF";
            $table->string('name');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
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
        Schema::dropIfExists('product_lines');
    }
}
