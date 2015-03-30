<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateTable extends Migration {

		/**
		* Run the migrations.
		*
		* @return void
		*/
		public function up()
		{
			Schema::create('authors', function($table)
				{
					$table->increments('id');
					$table->string('name');
					$table->string('discription');
					$table->string('avatar');
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
			//
		}

	}
