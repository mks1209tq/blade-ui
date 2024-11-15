<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PassportDataEntry;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('index displays view', function (): void {
    $passportDataEntries = PassportDataEntry::factory()->count(3)->create();

    $response = get(route('passport-data-entries.index'));

    $response->assertOk();
    $response->assertViewIs('passportDataEntry.index');
    $response->assertViewHas('passportDataEntries');
});


test('create displays view', function (): void {
    $response = get(route('passport-data-entries.create'));

    $response->assertOk();
    $response->assertViewIs('passportDataEntry.create');
});


test('store uses form request validation')
    ->assertActionUsesFormRequest(
        \App\Http\Controllers\PassportDataEntryController::class,
        'store',
        \App\Http\Requests\PassportDataEntryStoreRequest::class
    );

test('store saves and redirects', function (): void {
    $response = post(route('passport-data-entries.store'));

    $response->assertRedirect(route('passportDataEntries.index'));
    $response->assertSessionHas('passportDataEntry.id', $passportDataEntry->id);

    assertDatabaseHas(passportDataEntries, [ /* ... */ ]);
});


test('show displays view', function (): void {
    $passportDataEntry = PassportDataEntry::factory()->create();

    $response = get(route('passport-data-entries.show', $passportDataEntry));

    $response->assertOk();
    $response->assertViewIs('passportDataEntry.show');
    $response->assertViewHas('passportDataEntry');
});


test('edit displays view', function (): void {
    $passportDataEntry = PassportDataEntry::factory()->create();

    $response = get(route('passport-data-entries.edit', $passportDataEntry));

    $response->assertOk();
    $response->assertViewIs('passportDataEntry.edit');
    $response->assertViewHas('passportDataEntry');
});


test('update uses form request validation')
    ->assertActionUsesFormRequest(
        \App\Http\Controllers\PassportDataEntryController::class,
        'update',
        \App\Http\Requests\PassportDataEntryUpdateRequest::class
    );

test('update redirects', function (): void {
    $passportDataEntry = PassportDataEntry::factory()->create();

    $response = put(route('passport-data-entries.update', $passportDataEntry));

    $passportDataEntry->refresh();

    $response->assertRedirect(route('passportDataEntries.index'));
    $response->assertSessionHas('passportDataEntry.id', $passportDataEntry->id);
});


test('destroy deletes and redirects', function (): void {
    $passportDataEntry = PassportDataEntry::factory()->create();

    $response = delete(route('passport-data-entries.destroy', $passportDataEntry));

    $response->assertRedirect(route('passportDataEntries.index'));

    assertModelMissing($passportDataEntry);
});
