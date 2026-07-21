<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        return view('contact', [
            'locale' => $locale,
            'title' => __('Partner With Us'),
            'description' => __('If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help. Let\'s build projects that deliver adaptation, mitigation, and sustainable development.'),
        ]);
    }

    public function send(Request $request, ?string $locale = null): RedirectResponse
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');
        App::setLocale($locale);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Log::info('Contact form submission', $validated);

        return redirect()->route('contact', ['locale' => $locale])
            ->with('success', __('Thank you for reaching out. We will get back to you shortly.'));
    }
}