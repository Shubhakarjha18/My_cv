<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->boolean('enabled')->default(false); // Default is false, meaning not enabled
    });
}

public function down()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->dropColumn('enabled');
    });
}

};
