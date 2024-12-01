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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', allowed: ['new', 'accepted', 'refused', 'approved', 'forwarded', 'cleared', 'canceled', 'closed', 'returned'])->default('new');
            $table->enum('priority', allowed: ['Normal', 'Urgent', 'Emergency'])->default('Normal');
            $table->text('notes')->nullable();
            $table->date('expected_date')->nullable();
            $table->integer('expected_minutes')->nullable();
            $table->foreignId('checker_id')->constrained('users', 'id')->onDelete('cascade')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
