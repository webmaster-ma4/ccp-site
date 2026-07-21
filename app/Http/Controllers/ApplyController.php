<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplyController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('apply', [
            'locale' => app()->getLocale(),
        ]);
    }

    public function store(Request $request, string $locale = 'en'): RedirectResponse
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        $validated = $request->validate([
            'org_name'     => 'required|string|max:255',
            'org_type'     => 'required|string|max:100',
            'contact_name' => 'required|string|max:255',
            'contact_email'=> 'required|email|max:255',
            'project_title'=> 'required|string|max:500',
            'country'      => 'required|string|max:100',
            'sector'       => 'required|string|max:100',
            'funding'      => 'required|string|max:100',
            'description'  => 'required|string|min:50|max:5000',
        ]);

        // Store to database or send notification — for now log for audit trail
        \Illuminate\Support\Facades\Log::info('CCP Apply Submission', $validated);

        return redirect()->route('apply', ['locale' => $locale])
            ->with('success', __('Your application has been submitted. Our team will review it within 14 business days.'));
    }
}