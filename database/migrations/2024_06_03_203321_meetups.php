<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('meetups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('date');
            $table->string('location');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meetups');
    }

};
