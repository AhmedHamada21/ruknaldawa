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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('test');
            $table->string('address')->default('test');
            $table->string('phone')->default(011111111);
            $table->string('email')->default('test@test.com');
            $table->string('facebook')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
