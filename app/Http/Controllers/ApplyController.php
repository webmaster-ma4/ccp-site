<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('apply', [
            'locale' => app()->getLocale(),
        ]);
    }
}