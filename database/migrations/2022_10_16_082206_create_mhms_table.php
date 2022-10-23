<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhms', function (Blueprint $table) {
            $table->id('m_id');
            $table->integer('mg_id')->nullable();
            $table->string('m_name');
            $table->enum('status', ['1', '2'])->default('1')->comment = "1=active,2=inactive";
            $table->string('m_createBy', 25)->nullable();
            $table->string('m_updateBy', 25)->nullable();
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
        Schema::dropIfExists('mhms');
    }
}
