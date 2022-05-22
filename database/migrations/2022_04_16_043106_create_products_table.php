<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('priceP');
            $table->decimal('priceM');
            $table->decimal('priceG');
            $table->boolean('status');
            $table->enum('category', ['Doces', 'Salgadas']);
            $table->string('ingredients');
            $table->text('image');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
