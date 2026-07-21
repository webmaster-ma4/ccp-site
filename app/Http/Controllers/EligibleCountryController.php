<?php

namespace App\Http\Controllers;

use App\Models\EligibleCountry;
use Illuminate\Http\Request;

class EligibleCountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = EligibleCountry::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get(['id', 'name', 'iso_code', 'region', 'display_color', 'tooltip_text', 'description']);

        return response()->json($countries);
    }

    public function map(Request $request)
    {
        $countries = EligibleCountry::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('map', [
            'locale'      => app()->getLocale(),
            'countries'   => $countries,
            'title'       => __('Eligible Countries Map') . ' | ' . __('Climate Catalyst Prize'),
            'description' => __('Explore the Least Developed Countries eligible for Climate Catalyst Prize support. Interactive map of 46 LDCs across Africa, Asia, the Pacific and the Caribbean.'),
        ]);
    }
}
