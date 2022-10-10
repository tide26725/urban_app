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
        Schema::create('registers', function (Blueprint $table) {
            $table->id('register_id');
            $table->string('prefix');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->integer('district_id');
            $table->integer('amphure_id');
            $table->integer('province_id');
            $table->string('post_code');
            $table->string('tel_no')->unique();
            $table->string('email')->nullable();
            $table->tinyinteger('age');
            $table->tinyinteger('residence_mst_id')->nullable();
            $table->tinyinteger('farmland_mst_id')->nullable();
            $table->tinyinteger('education_lv_mst_id')->nullable();
            $table->tinyinteger('career_mst_id')->nullable();
            $table->tinyinteger('income_mst_id')->nullable();
            $table->tinyinteger('reason_mst_id')->nullable();
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
        Schema::dropIfExists('registers');
    }
};
