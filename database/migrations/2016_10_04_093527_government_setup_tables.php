<?php

//php artisan migrate --path=/database/migrations/government

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class GovernmentSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {

        Schema::create('politicians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('politicians_to_parties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('politician_id')->unsigned();
            $table->integer('partie_id')->unsigned();

            $table->foreign('politician_id')->references('id')->on('politicians')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('partie_id')->references('id')->on('parties')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('start_date');
            $table->dateTime('expiration_date');

        });

        
        Schema::create('government_acts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('title');
            $table->string('description');

        });

        Schema::create('government_act_to_review', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('government_act_id')->unsigned();
            $table->integer('review_id')->unsigned();

            $table->foreign('government_act_id')->references('id')->on('government_acts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('review_id')->references('id')->on('reviews')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('types_of_voting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });


        Schema::create('government_act_voting', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('government_act_id')->unsigned();
            $table->integer('politician_id')->unsigned();
            $table->integer('type_of_voting_id')->unsigned();

            $table->foreign('government_act_id')->references('id')->on('government_acts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('politician_id')->references('id')->on('politicians')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('type_of_voting_id')->references('id')->on('types_of_voting')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('government_cadences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('expiration_date');
        });

        Schema::create('government_cadences_to_politicians', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('government_cadence_id')->unsigned();
            $table->integer('politician_id')->unsigned();

            $table->foreign('government_cadence_id')->references('id')->on('government_cadences')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('politician_id')->references('id')->on('politicians')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('assessment_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('assessment_categories_user_score', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('government_act_id')->unsigned();
            $table->integer('assessment_categorie_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('government_act_id')->references('id')->on('government_acts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('assessment_categorie_id')->references('id')->on('assessment_categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('score');

        });

        Schema::create('country_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('party_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('party_functions_to_politicians', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('party_function_id')->unsigned();
            $table->integer('politician_id')->unsigned();

            $table->foreign('party_function_id')->references('id')->on('party_functions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('politician_id')->references('id')->on('politicians')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('party_functions_to_politicians');
        Schema::drop('party_functions');
        Schema::drop('country_functions');
        Schema::drop('assessment_categories_user_score');
        Schema::drop('assessment_categories');
        Schema::drop('government_cadences_to_politicians');
        Schema::drop('government_cadences');
        Schema::drop('government_act_voting');
        Schema::drop('types_of_voting');
        Schema::drop('government_act_to_review');
        Schema::drop('reviews');
        Schema::drop('government_acts');
        Schema::drop('politicians_to_parties');
        Schema::drop('parties');
        Schema::drop('politicians');
    }
}
