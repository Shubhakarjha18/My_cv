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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id'); // Foreign key column
            $table->string('Level', 50)->nullable();
            $table->string('college', 100)->nullable();
            $table->string('Location', 100)->nullable();
            $table->string('GPA', 10)->nullable();
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
        Schema::dropIfExists('educations');
    }
};
