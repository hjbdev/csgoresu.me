<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResumeFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('faceit_url')->nullable();
            $table->integer('faceit_rank')->nullable();
            $table->string('esea_url')->nullable();
            $table->string('esea_rank', 2)->nullable();
            $table->string('esl_url')->nullable();
            $table->string('esportal_url')->nullable();
            $table->integer('esportal_rank')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->integer('mm_rank')->nullable();
            $table->longText('about')->nullable();
            $table->longText('team_experience')->nullable();
            $table->json('roles')->nullable();
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
            $table->dropColumn('faceit_url');
            $table->dropColumn('faceit_rank');
            $table->dropColumn('esea_url');
            $table->dropColumn('esl_url');
            $table->dropColumn('esportal_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('mm_rank');
            $table->dropColumn('about');
            $table->dropColumn('team_experience');
            $table->dropColumn('roles');
        });
    }
}
