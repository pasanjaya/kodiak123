<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatogryIdToAdvertiesmentRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function(Blueprint $table){
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('advertiesment_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function(Blueprint $table){
            $table->dropColumn('category_id');
        });
    }
}
