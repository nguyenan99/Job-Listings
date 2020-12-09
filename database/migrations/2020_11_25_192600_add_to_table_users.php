<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->longText('about_user')->nullable();
            $table->longText('skill')->nullable();
            $table->longText('education')->nullable();
            $table->longText('work_exp')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image')->nullable();
            $table->dropColumn('address')->nullable();
            $table->dropColumn('phone')->nullable();
            $table->dropColumn('about_user')->nullable();
            $table->dropColumn('skill')->nullable();
            $table->dropColumn('education')->nullable();
            $table->dropColumn('work_exp')->nullable();
        });
    }
}
