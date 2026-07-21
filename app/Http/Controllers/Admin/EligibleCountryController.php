<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EligibleCountry;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EligibleCountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = EligibleCountry::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return Inertia::render('Admin/EligibleCountries/Index', [
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'iso_code' => 'required|string|size:3|unique:eligible_countries,iso_code',
            'description' => 'nullable|string',
            'region' => 'nullable|string|max:255',
            'display_color' => 'required|string|max:7',
            'tooltip_text' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $request->integer('sort_order', 0);

        EligibleCountry::create($validated);

        return back()->with('success', 'Country added successfully.');
    }

    public function update(Request $request, EligibleCountry $eligibleCountry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'iso_code' => 'required|string|size:3|unique:eligible_countries,iso_code,' . $eligibleCountry->id,
            'description' => 'nullable|string',
            'region' => 'nullable|string|max:255',
            'display_color' => 'required|string|max:7',
            'tooltip_text' => 'nullable|string',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $request->integer('sort_order', 0);

        $eligibleCountry->update($validated);

        return back()->with('success', 'Country updated successfully.');
    }

    public function edit(EligibleCountry $eligibleCountry)
    {
        return Inertia::render('Admin/EligibleCountries/Edit', [
            'country' => $eligibleCountry,
        ]);
    }

    public function destroy(EligibleCountry $eligibleCountry)
    {
        $eligibleCountry->delete();

        return back()->with('success', 'Country deleted successfully.');
    }
}
