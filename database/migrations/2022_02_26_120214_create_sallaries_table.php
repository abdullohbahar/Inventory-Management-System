<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sallaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('amount')->nullable();
            $table->string('sallary_date')->nullable();
            $table->string('sallary_month')->nullable();
            $table->string('sallary_year')->nullable();
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
        Schema::dropIfExists('sallaries');
    }
}
