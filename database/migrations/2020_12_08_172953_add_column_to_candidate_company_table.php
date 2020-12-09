<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCandidateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedInteger('job_id');

            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_company', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
            $table->dropForeign('job_id');
            $table->dropColumn('job_id');
        });
    }
}
