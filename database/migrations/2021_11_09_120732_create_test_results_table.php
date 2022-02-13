<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->unsignedInteger('RequestID');
            $table->unsignedInteger('patientID');
            $table->string('barcode');
            $table->string('testResult');
            $table->string('temperature');
            $table->string('pressure');
            $table->string('oxygen');
            $table->unsignedInteger('labUserID');
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
        Schema::dropIfExists('test_results');
    }
}
