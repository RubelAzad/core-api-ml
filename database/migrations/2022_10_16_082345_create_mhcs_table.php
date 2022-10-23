<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhcs', function (Blueprint $table) {
            $table->increments('c_id');
            $table->integer('cg_id')->nullable();
            $table->string('c_name');
            $table->unsignedBigInteger('cgl_id');
            $table->foreign('cgl_id')->references('l_id')->on('mhls')->onDelete('cascade');
            $table->unsignedBigInteger('cgm_id');
            $table->foreign('cgm_id')->references('m_id')->on('mhms')->onDelete('cascade');
            $table->date('c_sdate');
            $table->date('c_edate');
            $table->enum('status', ['1', '2'])->default('1')->comment = "1=active,2=inactive";
            $table->string('c_createby', 25)->nullable();
            $table->string('c_cpdateby', 25)->nullable();
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
        Schema::dropIfExists('mhcs');
    }
}
