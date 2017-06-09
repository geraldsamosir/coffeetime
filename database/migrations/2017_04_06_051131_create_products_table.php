<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
	
	/**
	* Run the migrations.
	     *
	     * @return void
	     */
	    public function up()
	    {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('category_id')->unsigned()->nullable()->default(null);
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
			$table->double('original_price');
			$table->double('discounted_price');
			$table->integer('discount_percent');
			$table->text('thumb_image');
			$table->text('images');
			$table->text('description');
			$table->boolean('is_beans');
			$table->boolean('status');
			$table->text('characteristics');
			$table->timestamps();
		}
		);
		
	}
	
	
	/**
	* Reverse the migrations.
	     *
	     * @return void
	     */
	    public function down()
	    {
		//
		Schema::dropIfExists('products');
	}
}
