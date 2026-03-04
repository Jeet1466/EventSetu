<?php

namespace App\Http\Controllers;

use App\Models\ClientRequest;
use App\Models\VendorCategory;
use App\Models\PriceRange;
use App\Models\RequestItem;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index()
    {
        $requests = ClientRequest::where('user_id', auth()->id())
            ->with(['requestItems.vendorCategory', 'requestItems.priceRange'])
            ->latest()
            ->get();

        return view('client.requests.index', compact('requests'));
    }

    public function create()
    {
        $categories = VendorCategory::all();
        $priceRanges = PriceRange::all();

        return view('client.requests.create', compact('categories', 'priceRanges'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_date' => 'required|date|after:today',
            'categories' => 'required|array|min:1',
            'categories.*.category_id' => 'required|exists:vendor_categories,id',
            'categories.*.price_range_id' => 'required|exists:price_ranges,id',
        ]);

        // Create the client request
        $clientRequest = ClientRequest::create([
            'user_id' => auth()->id(),
            'event_date' => $validated['event_date'],
            'status' => 'pending',
        ]);

        // Create request items for each category
        foreach ($validated['categories'] as $category) {
            RequestItem::create([
                'client_request_id' => $clientRequest->id,
                'vendor_category_id' => $category['category_id'],
                'price_range_id' => $category['price_range_id'],
            ]);
        }

        // Auto-distribute to matching vendors
        $this->autoDistributeToVendors($clientRequest);

        return redirect()->route('client.requests.index')
            ->with('success', 'Request created successfully and sent to matching vendors!');
    }

    public function show($id)
    {
        $request = ClientRequest::with([
            'requestItems.vendorCategory',
            'requestItems.priceRange',
            'requestItems.vendorResponses.vendor'
        ])->findOrFail($id);

        // Ensure user owns this request
        if ($request->user_id !== auth()->id()) {
            abort(403);
        }

        return view('client.requests.show', compact('request'));
    }

    private function autoDistributeToVendors($clientRequest)
    {
        // Get all request items
        $requestItems = $clientRequest->requestItems;

        foreach ($requestItems as $item) {
            // Find matching vendors based on category and price range
            $matchingVendors = \App\Models\User::where('role', 'vendor')
                ->where('vendor_category_id', $item->vendor_category_id)
                ->where('price_range_id', $item->price_range_id)
                ->get();

            // Automatically create a notification or create a "pending" record
            // For now, we'll just make vendors aware via the dashboard query
            // In a production app, you might send email notifications here
        }
    }
}
