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
        Schema::create('menus', function (Blueprint $table) {
             $table->string('id')->primary();
             $table->string('restaurant_id');
             $table->string('name');
             $table->string('name_jpn')->nullable();
             $table->integer('price');
             $table->integer('sort_order')->default(0);
             $table->integer('category')->default(0);
             $table->integer('sub_category')->default(0);
             $table->integer('region')->default(0);
             $table->integer('is_min_price')->default(0);
             $table->integer('is_hidden')->default(0);
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      */
    public function down(): void
     {
        Schema::dropIfExists('menus');
     }
};
