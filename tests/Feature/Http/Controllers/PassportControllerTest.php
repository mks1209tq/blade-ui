<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Passport;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('index displays view', function (): void {
    $passports = Passport::factory()->count(3)->create();

    $response = get(route('passports.index'));

    $response->assertOk();
    $response->assertViewIs('passport.index');
    $response->assertViewHas('passports');
});


test('create displays view', function (): void {
    $response = get(route('passports.create'));

    $response->assertOk();
    $response->assertViewIs('passport.create');
});


test('store uses form request validation')
    ->assertActionUsesFormRequest(
        \App\Http\Controllers\PassportController::class,
        'store',
        \App\Http\Requests\PassportStoreRequest::class
    );

test('store saves and redirects', function (): void {
    $response = post(route('passports.store'));

    $response->assertRedirect(route('passports.index'));
    $response->assertSessionHas('passport.id', $passport->id);

    assertDatabaseHas(passports, [ /* ... */ ]);
});


test('show displays view', function (): void {
    $passport = Passport::factory()->create();

    $response = get(route('passports.show', $passport));

    $response->assertOk();
    $response->assertViewIs('passport.show');
    $response->assertViewHas('passport');
});


test('edit displays view', function (): void {
    $passport = Passport::factory()->create();

    $response = get(route('passports.edit', $passport));

    $response->assertOk();
    $response->assertViewIs('passport.edit');
    $response->assertViewHas('passport');
});


test('update uses form request validation')
    ->assertActionUsesFormRequest(
        \App\Http\Controllers\PassportController::class,
        'update',
        \App\Http\Requests\PassportUpdateRequest::class
    );

test('update redirects', function (): void {
    $passport = Passport::factory()->create();

    $response = put(route('passports.update', $passport));

    $passport->refresh();

    $response->assertRedirect(route('passports.index'));
    $response->assertSessionHas('passport.id', $passport->id);
});


test('destroy deletes and redirects', function (): void {
    $passport = Passport::factory()->create();

    $response = delete(route('passports.destroy', $passport));

    $response->assertRedirect(route('passports.index'));

    assertModelMissing($passport);
});
