<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('requirements')->nullable();
            $table->string('address')->nullable();
            $table->boolean('top_rated')->default(0)->nullable();
            $table->string('salary');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('company_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('location')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
}
