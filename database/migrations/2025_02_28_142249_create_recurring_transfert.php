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
        Schema::create('recurring_transfert', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('frequency');
            $table->integer('amount');
            $table->text('reason');
            $table->foreignId('recipient_id')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_transfert');
    }
};
