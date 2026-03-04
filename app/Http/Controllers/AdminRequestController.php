<?php

namespace App\Http\Controllers;

use App\Models\ClientRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index()
    {
        $requests = ClientRequest::with(['user', 'requestItems.vendorCategory', 'requestItems.priceRange'])
            ->latest()
            ->get();

        return view('admin.requests.index', compact('requests'));
    }

    public function show($id)
    {
        $request = ClientRequest::with([
            'user',
            'requestItems.vendorCategory',
            'requestItems.priceRange',
            'requestItems.vendorResponses.vendor'
        ])->findOrFail($id);

        return view('admin.requests.show', compact('request'));
    }
}
