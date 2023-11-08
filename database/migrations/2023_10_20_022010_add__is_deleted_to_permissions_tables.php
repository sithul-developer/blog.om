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
        Schema::table('permissions', function (Blueprint $table) {
            $table->tinyInteger('Is_deleted')->comment('0:not delete,1:delete')->default(0);
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->tinyInteger('Is_deleted')->comment('0:not delete,1:delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions_tables', function (Blueprint $table) {
            //
        });
    }
};
