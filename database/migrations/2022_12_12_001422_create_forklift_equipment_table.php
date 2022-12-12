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
        Schema::create('forklift_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forklift_id');
            $table->unsignedBigInteger('equipment_id');

            $table->unique(['forklift_id', 'equipment_id'], 'forklift_equipment_unique');
        });

        Schema::table('forklift_equipment', function($table) {
            $table->foreign('forklift_id')->references('id')->on('forklifts')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('forklift_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forklift_equipment');
    }
};
