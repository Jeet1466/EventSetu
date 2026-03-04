<?php

namespace App\Http\Controllers;

use App\Models\RequestItem;
use App\Models\VendorResponse;
use App\Models\VendorCategory;
use App\Models\PriceRange;
use Illuminate\Http\Request;

class VendorResponseController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get all request items matching vendor's category and price range
        $matchingRequests = RequestItem::with(['clientRequest.user', 'vendorCategory', 'priceRange'])
            ->where('vendor_category_id', $user->vendor_category_id)
            ->where('price_range_id', $user->price_range_id)
            ->whereHas('clientRequest', function($query) {
                $query->where('status', '!=', 'completed');
            })
            ->whereDoesntHave('vendorResponses', function($query) {
                $query->where('vendor_id', auth()->id());
            })
            ->latest()
            ->get();

        // Get vendor's responses
        $myResponses = VendorResponse::with(['requestItem.clientRequest', 'requestItem.vendorCategory', 'requestItem.priceRange'])
            ->where('vendor_id', auth()->id())
            ->latest()
            ->get();

        return view('vendor.dashboard', compact('matchingRequests', 'myResponses'));
    }

    public function accept($requestItemId)
    {
        $requestItem = RequestItem::with(['vendorCategory', 'priceRange', 'clientRequest'])->findOrFail($requestItemId);

        return view('vendor.accept', compact('requestItem'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_item_id' => 'required|exists:request_items,id',
            'quoted_price' => 'required|numeric|min:0',
            'contact_details' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        VendorResponse::create([
            'request_item_id' => $validated['request_item_id'],
            'vendor_id' => auth()->id(),
            'quoted_price' => $validated['quoted_price'],
            'contact_details' => $validated['contact_details'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'accepted',
        ]);

        // Update request status to in_progress
        $requestItem = RequestItem::find($validated['request_item_id']);
        $requestItem->clientRequest->update(['status' => 'in_progress']);

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Response submitted successfully! Client will see your details.');
    }

    public function profile()
    {
        $categories = VendorCategory::all();
        $priceRanges = PriceRange::all();
        
        return view('vendor.profile', compact('categories', 'priceRanges'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'vendor_category_id' => 'required|exists:vendor_categories,id',
            'price_range_id' => 'required|exists:price_ranges,id',
        ]);

        auth()->user()->update($validated);

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Profile updated successfully!');
    }
}
