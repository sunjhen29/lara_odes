<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaturdayAuctionLookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sat_auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->string('unit_no');
            $table->string('street_no');
            $table->string('street_name');
            $table->string('street_ext');
            $table->string('street_direction');
            $table->string('suburb');
            $table->integer('post_code')->nullable();
            $table->string('property_type');
            $table->string('sale_type');
            $table->string('sold_price');
            $table->date('contract_date')->nullable();
            $table->date('settlement_date')->nullable();
            $table->string('agency_name');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('car');
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
        Schema::drop('sat_auctions');
    }
}
