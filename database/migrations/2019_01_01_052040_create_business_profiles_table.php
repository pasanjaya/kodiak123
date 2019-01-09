<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('reg_name');
            $table->string('reg_no');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('about')->nullable();
            $table->string('image_name');
            $table->string('street');
            $table->string('city');
            $table->string('tel');
            $table->string('url')->nullable();
            $table->string('business_email');
            $table->string('inq_mail');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('business_profiles');
    }
}
