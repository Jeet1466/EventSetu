<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Redirect based on role
        return match($user->role) {
            'admin' => redirect()->route('admin.requests.index'),
            'vendor' => redirect()->route('vendor.dashboard'),
            'client' => redirect()->route('client.requests.index'),
            default => redirect()->route('dashboard'),
        };
    }
}
