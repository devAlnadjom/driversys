<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id');
            $table->bigInteger('vehicule_id');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('week_id')->nullable();

            $table->date('date');
            $table->integer('totalhour')->default(0);
            $table->string('day')->nullable();
            $table->boolean('shift_day')->default(false);
            $table->boolean('shift_evening')->default(false);
            $table->boolean('shift_nighr')->default(false);

            $table->integer('coef')->default(1);
            $table->string('comment')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drives');
    }
}
