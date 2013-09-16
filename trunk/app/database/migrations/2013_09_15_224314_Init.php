<?php

use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->increments('id')->index()->unsigned();
            $table->string('email', 1000);
            $table->string('password', 1000);
            $table->timestamps();
        });

        //create websites Schema
        Schema::create('websites', function ($table) {
            $table->increments('id')->index()->unsigned();
            $table->string('name', 1000);
            $table->string('code', 20);
            $table->integer('userId')->index()->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        //create logs Schema
        Schema::create('logs', function ($table) {
            $table->increments('id')->index()->unsigned();
            $table->string('url');
            $table->string('httpReferrer');
            $table->dateTime('visitedAt');
            $table->string('ip');
            $table->integer('websiteId')->index()->unsigned();
            $table->foreign('websiteId')->references('id')->on('websites')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(array('id' => 1,
                'email' => 'admin@admin.com', 'password' => Hash::make('asdf1234'), 'created_at' => new DateTime(), 'updated_at' => new DateTime()
            )));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websites', function ($table) {
            $table->dropForeign('websites_userid_foreign');
        });

        Schema::table('logs', function ($table) {
            $table->dropForeign('logs_websiteid_foreign');
        });

        Schema::drop('logs');
        Schema::drop('websites');
        Schema::drop('users');
    }

}