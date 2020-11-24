<?php

namespace App\Http\Controllers;

use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        return view('admin.pages.settings', ["maintenance" => $settings->maintenance]);
    }
}
