<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetallePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('cantidad');

            $table->timestamps();

            $table->bigInteger('pedidoId')->unsigned();
            $table->foreign('pedidoId')->references('id')->on('pedidos');

            $table->bigInteger('productoId')->unsigned();
            $table->foreign('productoId')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
