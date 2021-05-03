<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('queue_no');
            $table->string('name');
            $table->string('identity');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('job');
            $table->text('address');
            $table->string('result')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('received')->default(0);
            $table->text('interpretation')->nullable();
            $table->foreignId('doctor_id');
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
        Schema::dropIfExists('patients');
    }
}
