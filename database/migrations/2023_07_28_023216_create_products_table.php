<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->decimal('price');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->longText('hightLighted_info');
            $table->longText('description');
            $table->string('address');
            $table->integer('type');//1=sell, 2=exchange
            $table->integer('condition');//1=new, 2=used
            $table->integer('status')->default(0);//0=available,1=sold out
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
