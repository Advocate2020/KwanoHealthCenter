<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurseFavouriteSuburbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_favourite_suburbs', function (Blueprint $table) {
            $table->unsignedInteger('nurseID');
            $table->unsignedInteger('suburbID');
            $table->timestamps();

            $table->index('suburbID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurse_favourite_suburbs');
    }
}
