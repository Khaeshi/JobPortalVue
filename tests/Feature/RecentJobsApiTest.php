<?php

use App\Models\User;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

function makeJob(User $user, string $title, int $daysAgo): Job {
    return $user->jobs()->create([
        'title' => $title,
        'company' => 'ACME Inc.',
        'location' => 'Remote',
        'type' => 'Full-time',
        'salary' => '$100k',
        'status' => 'active',
        'description' => 'Test description',
        'posted' => now()->toDateString(),
        'created_at' => now()->subDays($daysAgo),
        'updated_at' => now()->subDays($daysAgo),
    ]);
}

test('guests cannot access recent jobs API', function () {
    $this->getJson('/api/recent-jobs')->assertUnauthorized(); // 401
});

test('returns 3 most recent jobs ordered by created_at desc', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    // Create 5 jobs with different created_at
    makeJob($user, 'Oldest', 5);
    makeJob($user, 'Older', 4);
    makeJob($user, 'Middle', 3);
    $j2 = makeJob($user, 'Newer', 2);
    $j1 = makeJob($user, 'Newest', 1);

    $res = $this->getJson('/api/recent-jobs')->assertOk();
    $data = $res->json();

    expect($data)->toHaveCount(3);
    expect($data[0]['title'])->toBe('Newest');
    expect($data[1]['title'])->toBe('Newer');
    expect($data[2]['title'])->toBe('Middle');
});
