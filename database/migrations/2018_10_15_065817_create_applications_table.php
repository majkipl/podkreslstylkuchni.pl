<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('email', 320)->unique();
            $table->string('phone', 32);
            $table->string('address', 128);
            $table->string('address_nb', 16);
            $table->string('zip', 6);
            $table->string('city', 64);
            $table->string('img_receipt', 255);
            $table->string('img_ean', 255);
            $table->string('img_box', 255);
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3')->default(true);
            $table->boolean('legal_4')->default(false);
            $table->string('token', 32)->nullable();

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
        Schema::dropIfExists('applications');
    }
}
