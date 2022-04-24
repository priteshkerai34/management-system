<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('items_url');
            $table->decimal('current_price',10,2);
            $table->decimal('regular_price',10,2);
            $table->integer('available_stock');
            $table->longtext('description')->nullable();
            $table->string('item_visibility');
            $table->string('category');
            $table->string('item_tax_category');
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
        Schema::drop('items');
    }
}
