<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up()
	{
		Schema::create('tips', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('tipSymbol', 20);
      $table->string('tipCurrentPrice', 20);
      $table->string('tipBuyPrice', 20);
      $table->string('tipSellPrice', 20);
	    $table->string('tipExpert', 64);
	    $table->string('tipRating', 20);
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
		Schema::drop('tips');
	}

}
