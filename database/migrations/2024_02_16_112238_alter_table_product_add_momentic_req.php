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
        Schema::table('product', function (Blueprint $table) {
            $table->string('project_product_id')->nullable();
            $table->string('product_key')->nullable();
            $table->string('project_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('project_product_id')->nullable();
            $table->dropColumn('product_key')->nullable();
            $table->dropColumn('project_key')->nullable();
        });
    }
};
