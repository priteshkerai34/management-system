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
            $table->string('url_items');
            $table->decimal('current_price',10,2);
            $table->decimal('Regular_price',10,2);
            $table->integer('available_stock');
            $table->longtext('description')->nullable();
            $table->boolean('item_visibility');
            $table->unsignedbiginteger('category');
            $table->unsignedbiginteger('item_tax_category');
            $table->timestamps();
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('item_tax_category')->references('id')->on('tax_categories');
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
