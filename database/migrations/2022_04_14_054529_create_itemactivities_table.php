<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemactivities', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('name')->nullable();
            $table->string('url_items')->nullable();
            $table->decimal('current_price',10,2)->nullable();
            $table->decimal('Regular_price',10,2)->nullable();
            $table->integer('available_stock')->nullable();
            $table->longtext('description')->nullable();
            $table->boolean('item_visibility')->nullable();
            $table->biginteger('category')->nullable();
            $table->biginteger('item_tax_category')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('itemactivities');
    }
}
