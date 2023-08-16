<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('turbine_id')->constrained()->onDelete('cascade');;
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');;
            $table->text('description')->description('inspection description');

            $table->foreign('turbine_id')->references('id')->on('turbines');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('inspections');
    }
};
