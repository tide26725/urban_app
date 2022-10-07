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
        Schema::create('register_courses', function (Blueprint $table) {
            $table->id('register_course_id');
            $table->integer('course_id');
            $table->integer('register_id');
            $table->integer('number_sequence')->nullable();
            $table->string('course_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->tinyinteger('course_group');
            $table->tinyinteger('status')->default(0);
            $table->integer('approved_by')->nullable();
            $table->datetime('approved_datetime')->nullable();
            $table->integer('canceled_by')->nullable();
            $table->datetime('canceled_datetime')->nullable();
            $table->tinyinteger('is_delete')->default(0);
            $table->integer('deleted_by')->nullable();
            $table->datetime('deleted_datetime')->nullable();
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
        Schema::dropIfExists('register_courses');
    }
};
