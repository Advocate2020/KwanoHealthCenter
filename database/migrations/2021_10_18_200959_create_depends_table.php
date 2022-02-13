<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depends', function (Blueprint $table) {
            $table->bigIncrements('dependentID');
            $table->unsignedInteger('memberID');
            $table->string('name');
            $table->string('surname');
            $table->string('idNumber');
            $table->string('email');
            $table->string('phone');
            $table->string('medicalAid');
            $table->unsignedInteger('medical_id')->nullable();
            $table->unsignedInteger('plan_id')->nullable();
            $table->string('medical_number')->nullable();
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('person_resposible');
            $table->unsignedInteger('suburb_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->index('memberID');
            $table->index('suburb_id');
            $table->index('medical_id');
            $table->index('plan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depends');
    }
}
