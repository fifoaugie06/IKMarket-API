<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('provincy_id')->references('id')->on('provincies');
            $table->foreignId('regency_id')->references('id')->on('regencies');
            $table->foreignId('district_id')->references('id')->on('districts');
            $table->text('fulladdress');
            $table->string('longlat');
            $table->foreignId('market_category_id')->references('id')->on('market_categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
}
