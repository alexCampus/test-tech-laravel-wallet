<?php

namespace Database\Factories;

use App\Models\RecurringTransfer;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecurringTransferFactory extends Factory
{
    protected $model = RecurringTransfer::class;

    public function definition()
    {
        return [
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'frequency' => fake()->numberBetween(1, 12),
            'amount' => 1000,
            'reason' => fake()->sentence()
        ];
    }
}
