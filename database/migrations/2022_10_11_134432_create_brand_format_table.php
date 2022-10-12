<?php

use App\Models\Admin\Brand;
use App\Models\Admin\Format;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_format', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Brand::class)->constrained();
            $table->foreignIdFor(Format::class)->constrained();

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
        Schema::dropIfExists('brand_format');
    }
};
