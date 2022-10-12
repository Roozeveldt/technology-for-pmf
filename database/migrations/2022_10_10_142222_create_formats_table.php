<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('formats', function ( Blueprint $table ) {
			$table->id();

            $table->string('code', 3)->unique();
            $table->string('title');
            $table->softDeletes();

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('formats');
	}
};
