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
        Schema::create('forklifts', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('type');
            $table->string('year')->nullable();
            $table->string('serial');
            $table->string('next_inspection');
            $table->string('fuel');
            $table->string('owner')->default('Þorbjörn');
            $table->string('location')->nullable();

            $table->foreignId('forklift_class_id')
                    ->references('id')
                    ->on('forklift_classes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('forklifts');
    }
};
