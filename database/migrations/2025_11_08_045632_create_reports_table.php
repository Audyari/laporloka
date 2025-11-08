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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('report_categories')->onDelete('restrict');
            $table->string('title');
            $table->text('description');
            $table->string('location_address');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('status')->default('pending'); // pending, reviewed, in_progress, resolved, rejected
            $table->string('priority')->default('medium'); // low, medium, high, urgent
            $table->string('report_number')->unique();
            $table->timestamp('reported_at');
            $table->timestamp('resolved_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('assigned_to')->nullable(); // admin user id
            $table->integer('views_count')->default(0);
            $table->boolean('is_public')->default(true);
            $table->timestamps();
            
            $table->index(['status', 'priority']);
            $table->index(['user_id', 'status']);
            $table->index(['category_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
