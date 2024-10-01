<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id'); // Foreign key column
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('Linkedn', 255)->nullable();
            $table->string('Twitter', 255)->nullable();
            $table->string('Github', 255)->nullable();
            $table->timestamps();

             // Foreign key constraint
             $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
