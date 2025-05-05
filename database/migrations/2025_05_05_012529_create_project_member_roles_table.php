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
        Schema::create('project_member_roles', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('project_member_id')->constrained()->onDelete('cascade');
            $table->foreignUlid('role_id')->constrained('project_roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_member_roles');
    }
};
