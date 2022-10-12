<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('employees', function ( Blueprint $table ) {
			$table->id();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 18)->unique();
            $table->string('position', 50);
            $table->tinyInteger('role')->default(10);
            $table->string('password');
            $table->softDeletes();

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('employees');
	}
};
