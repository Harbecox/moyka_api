<?php

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
        Schema::create('pack_to_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pack_id")->index();
            $table->foreign('pack_id')->references('id')->on('packs');
            $table->unsignedBigInteger("category_id")->index();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('pack_to_categories');
    }
};
