<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('packages', function ( Blueprint $table ) {
			$table->id();

            $table->string('code', 5)->unique();
            $table->string('title', 16);
            $table->string('description');
            $table->softDeletes();

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('packages');
	}
};
