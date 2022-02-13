<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('RequestID');
            $table->unsignedInteger('requestorID');
            $table->string('requestDate');
            $table->string('requestTime');
            $table->string('status');
            $table->unsignedInteger('testSubjectID');
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->unsignedInteger('suburb_id');
            $table->timestamps();

            $table->index('requestorID');
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
        Schema::dropIfExists('requests');
    }
}
