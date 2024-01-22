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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('currency')->nullable();
            $table->decimal('origin_value', 18, 2)->nullable();
            $table->decimal('rate_currency', 18, 2)->nullable();
            $table->decimal('converted', 18, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropColumn('origin_value');
            $table->dropColumn('rate');
            $table->dropColumn('converted');
        });
    }
};
