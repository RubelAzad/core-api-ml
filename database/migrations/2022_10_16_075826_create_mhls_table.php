<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhls', function (Blueprint $table) {
            $table->id('l_id');
            $table->integer('lg_id')->nullable();
            $table->enum('status', ['1', '2'])->default('1')->comment = "1=active,2=inactive";
            $table->string('l_CreateBy', 25)->nullable();
            $table->string('l_UpdateBy', 25)->nullable();
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
        Schema::dropIfExists('mhls');
    }
}
