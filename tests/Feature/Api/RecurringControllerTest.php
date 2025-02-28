<?php

declare(strict_types=1);

use App\Models\RecurringTransfer;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\getJson;

test('can list recurring transactions', function () {
    $users = User::factory()
        ->count(2)
        ->sequence([
            'name' => 'John Doe',
        ], [
            'name' => 'Jane Doe',
        ])
        ->create();
    RecurringTransfer::factory()->count(3)->create([
        'user_id' => $users->first->id,
        'recipient_id' => $users->where('name', 'Jane Doe')->first()->id,
    ]);
    actingAs($users->first());
    $response = getJson('/api/v1/recurrings', [
        'Authorization' => 'Bearer '.$users->first()->createToken('test')->plainTextToken,
    ]);
    $response->assertOk();
    $response->assertJsonCount(3, 'data');
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'start_date',
                'end_date',
                'frequency',
                'amount',
                'reason',
                'recipient',
            ],
        ],
    ]);
});
