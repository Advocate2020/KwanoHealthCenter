<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->unsignedInteger('nurseID');
            $table->string('name');
            $table->string('surname');
            $table->string('idNumber');
            $table->string('phone');
            $table->string('email');
            $table->unsignedInteger('suburb_id');
            $table->timestamps();


            $table->index('suburb_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
}
