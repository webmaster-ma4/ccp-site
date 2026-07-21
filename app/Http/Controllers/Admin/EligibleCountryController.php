<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EligibleCountry;
use Illuminate\Http\Request;

class EligibleCountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = EligibleCountry::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.eligible-countries.index', [
            'countries' => $countries,
        ]);
    }

    public function create()
    {
        $existingIsoCodes = EligibleCountry::pluck('iso_code')->map(fn($code) => strtoupper($code))->toArray();

        return view('admin.eligible-countries.create', [
            'existingIsoCodes' => $existingIsoCodes,
        ]);
    }

    public function store(Request $request)
    {
        // Check if bulk addition request
        if ($request->has('bulk_countries') && is_array($request->input('bulk_countries'))) {
            $bulkCount = 0;
            foreach ($request->input('bulk_countries') as $countryData) {
                if (empty($countryData['iso_code']) || empty($countryData['name'])) {
                    continue;
                }
                $iso = strtoupper(trim($countryData['iso_code']));
                if (!EligibleCountry::where('iso_code', $iso)->exists()) {
                    EligibleCountry::create([
                        'name' => trim($countryData['name']),
                        'iso_code' => $iso,
                        'region' => $countryData['region'] ?? 'Global',
                        'display_color' => '#087F5B',
                        'is_active' => true,
                        'sort_order' => 0,
                    ]);
                    $bulkCount++;
                }
            }

            return redirect()->route('admin.eligible-countries.index')
                ->with('success', $bulkCount > 0 ? __(':count pays ont été ajoutés avec succès.', ['count' => $bulkCount]) : __('Aucun nouveau pays n\'a été ajouté.'));
        }

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

        $validated['iso_code'] = strtoupper($validated['iso_code']);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $request->integer('sort_order', 0);

        EligibleCountry::create($validated);

        return redirect()->route('admin.eligible-countries.index')->with('success', __('Country added successfully.'));
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
        return view('admin.eligible-countries.edit', [
            'country' => $eligibleCountry,
        ]);
    }

    public function destroy(EligibleCountry $eligibleCountry)
    {
        $eligibleCountry->delete();

        return back()->with('success', 'Country deleted successfully.');
    }
}
