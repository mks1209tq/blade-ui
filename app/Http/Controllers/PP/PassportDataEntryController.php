<?php

namespace App\Http\Controllers\PP;

use App\Http\Requests\PassportDataEntryStoreRequest;
use App\Http\Requests\PassportDataEntryUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Passport;

class PassportDataEntryController extends Controller
{
    public function index(Request $request): View
    {
        $passportDataEntries = Passport::all()->where('is_data_entered', false)->where('user_id', auth()->user()->id);

        return view('apps.hr.passport.data-entry.index', compact('passportDataEntries'));
    }

    public function create(Request $request): Response
    {
        return view('passportDataEntry.create');
    }

    public function store(PassportDataEntryStoreRequest $request): Response
    {
        $passportDataEntry = PassportDataEntry::create($request->validated());

        $request->session()->flash('passportDataEntry.id', $passportDataEntry->id);

        return redirect()->route('passportDataEntries.index');
    }

    public function show(Request $request, PassportDataEntry $passportDataEntry): Response
    {
        return view('passportDataEntry.show', compact('passportDataEntry'));
    }

    public function edit(Request $request, PassportDataEntry $passportDataEntry): Response
    {
        return view('passportDataEntry.edit', compact('passportDataEntry'));
    }

    public function update(PassportDataEntryUpdateRequest $request, PassportDataEntry $passportDataEntry): Response
    {
        $passportDataEntry->update($request->validated());

        $request->session()->flash('passportDataEntry.id', $passportDataEntry->id);

        return redirect()->route('passportDataEntries.index');
    }

    public function destroy(Request $request, PassportDataEntry $passportDataEntry): Response
    {
        $passportDataEntry->delete();

        return redirect()->route('passportDataEntries.index');
    }
}
