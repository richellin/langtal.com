<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            //Add columns for Laravel Stapler 
            $table->string('img1', 256);
            $table->timestamp('img1_updated_at');
            $table->string('img2', 256);
            $table->timestamp('img2_updated_at');
            $table->string('img3', 256);
            $table->timestamp('img3_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('img1');
            $table->dropColumn('img1_updated_at');
            $table->dropColumn('img2');
            $table->dropColumn('img2_updated_at');
            $table->dropColumn('img3');
            $table->dropColumn('img3_updated_at');
        });
    }
}
