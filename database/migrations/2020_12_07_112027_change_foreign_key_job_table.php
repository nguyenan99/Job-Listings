<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->foreign('company_id')
                ->references('id')
                ->on('company')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

            $table->foreign('company_id')
                ->references('id')
                ->on('location')
                ->onDelete('cascade');
        });
    }
}
