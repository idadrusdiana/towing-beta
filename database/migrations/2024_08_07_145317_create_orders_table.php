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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('car_name', 15);
            $table->string('plate_number', 15);
            $table->string('color', 15);
            $table->string('category', 15);
            $table->string('condition', 15);
            $table->string('memo', 191)->nullable();
            $table->date('date_order');
            $table->string('time', 15)->nullable();
            $table->string('PIC_1', 15);
            $table->string('PIC_2', 15);
            $table->date('date_confirm')->nullable();
            $table->string('time_confirm', 15)->nullable();
            $table->string('towing', 15)->nullable();
            $table->boolean('is_confirm')->default(0);
            $table->boolean('is_done')->default(0);
            $table->foreignId('driver_id')->nullable()->references('id')->on('drivers')->onDelete('cascade');
            $table->foreignId('store_id_1')->nullable()->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('store_id_2')->nullable()->references('id')->on('stores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
