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
        Schema::create('itenspedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->dateTime('data_item');
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produtos')->cascadeOnDelete();
            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itenspedidos');
    }
};
