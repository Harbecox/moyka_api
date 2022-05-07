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
        Schema::create('pack_to_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pack_id");
            $table->foreign('pack_id')->references('id')->on('packs');
            $table->unsignedBigInteger("company_id");
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('pack_to_companies');
    }
};
