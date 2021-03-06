<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){
            $table->increments('id');
            $table->string("name")->unique();
            $table->string("type")->nullable();
            $table->string("image")->nullable();
            $table->string("measurement_unit");
            $table->timestamps();
        } );

        Schema::create('auctions',function (Blueprint $table){
            $table->increments('id');
            $table->string("name")->unique();
            $table->integer("base_price")->unsigned();
            $table->string('location');
            $table->string('status');
            $table->integer('product_id');
            $table->integer('seller_id');
            $table->date('bidding_end');
            $table->string('quantity');

            $table->timestamps();

            $table->foreign('product_id') ->references('id')->on('products')->onDelete('cascade');;
            $table->foreign('seller_id') ->references('id')->on('users')->onDelete('cascade');;
        } );

        Schema::create('bids',function (Blueprint $table){
            $table->increments('id');
            $table->integer('auction_id');
            $table->integer('buyer_id');
            $table->integer('amount');
            $table->integer('quantity');
            $table->string('status');

            $table->timestamps();
            
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');;
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');;
        } );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bids');
        Schema::drop('auctions');
        Schema::drop('products');
    }
}
