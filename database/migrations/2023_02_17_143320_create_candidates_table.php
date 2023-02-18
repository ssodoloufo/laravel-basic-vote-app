<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('civility')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('department');
            $table->string('email');
            $table->string('hiring_date')->date('Y-m-d')->nullable();
            $table->string('seniority');
            $table->string('note')->default(0);
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
        Schema::dropIfExists('candidates');
    }
}
