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
        Schema::create('components', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('turbine_id')->constrained()->onDelete('cascade');
            $table->string('name')->description('component name');
            $table->text('description')->nullable()->description('component description');
            $table->integer('level_damage')->description('component damage level');

            $table->foreign('turbine_id')->references('id')->on('turbines');

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
        Schema::dropIfExists('components');
    }
};
