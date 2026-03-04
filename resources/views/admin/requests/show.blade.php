@extends('layouts.app')

@section('title', 'Request Details - Admin')

@section('content')
<section style="padding: 3rem 0; background: var(--white);">
    <div class="container">
        <!-- Header -->
        <div data-aos="fade-up" style="margin-bottom: 3rem;">
            <h2 class="text-gradient">Request Details</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Admin view of client request and vendor responses</p>
        </div>

        <!-- Client Info Card -->
        <div class="card" data-aos="fade-up" style="margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary-cream), var(--white));">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <h3 style="margin-bottom: 0.5rem;">Client: {{ $request->user->name }}</h3>
                    <p style="margin-bottom: 0.25rem; color: var(--gray-600);">📧 {{ $request->user->email }}</p>
                    <p style="margin-bottom: 0; color: var(--gray-600);">📅 Event: {{ $request->event_date->format('M d, Y') }}</p>
                </div>
                <span style="padding: 0.5rem 1rem; border-radius: var(--radius-full); font-weight: 600;
                    @if($request->status == 'pending') background: #FEF3C7; color: #92400E;
                    @elseif($request->status == 'in_progress') background: #DBEAFE; color: #1E40AF;
                    @else background: #D1FAE5; color: #065F46;
                    @endif">
                    {{ ucfirst($request->status) }}
                </span>
            </div>
        </div>

        <div class="grid grid-2" style="align-items: start;">
            <!-- Requested Services -->
            <div data-aos="fade-right">
                <h3 style="margin-bottom: 1.5rem;">🎯 Requested Services</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($request->requestItems as $item)
                        <div class="card">
                            <h4 style="color: var(--primary-gold); margin-bottom: 0.5rem;">{{ $item->vendorCategory->name }}</h4>
                            <p style="margin-bottom: 0.5rem;"><strong>Budget:</strong> {{ $item->priceRange->label }}</p>
                            <p style="margin: 0; font-size: 0.875rem;">
                                <span style="color: var(--success);">✓ Auto-distributed to matching vendors</span><br>
                                <span style="color: var(--info);">{{ $item->vendorResponses->count() }} response(s) received</span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Vendor Responses -->
            <div data-aos="fade-left">
                <h3 style="margin-bottom: 1.5rem;">💼 Vendor Responses</h3>
                @php
                    $allResponses = $request->requestItems->flatMap->vendorResponses;
                @endphp

                @if($allResponses->isEmpty())
                    <div class="card text-center">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">⏳</div>
                        <h4>No Vendor Responses</h4>
                        <p style="color: var(--gray-600);">Waiting for vendors to submit proposals</p>
                    </div>
                @else
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        @foreach($allResponses as $response)
                            <div class="card" style="border-left: 4px solid var(--primary-gold);">
                                <div style="display: flex; justify-content: space-between; align-items-start; margin-bottom: 1rem;">
                                    <div>
                                        <h4 style="margin-bottom: 0.25rem;">{{ $response->vendor->name }}</h4>
                                        <p style="color: var(--gray-600); margin-bottom: 0.25rem; font-size: 0.875rem;">{{ $response->requestItem->vendorCategory->name }}</p>
                                        <p style="color: var(--gray-500); margin: 0; font-size: 0.875rem;">{{ $response->vendor->email }}</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <p style="font-size: 1.5rem; font-weight: 700; color: var(--success); margin: 0;">₹{{ number_format($response->quoted_price) }}</p>
                                        <p style="font-size: 0.75rem; color: var(--gray-600); margin: 0;">Quoted Price</p>
                                    </div>
                                </div>
                                
                                <div style="background: var(--gray-50); padding: 0.875rem; border-radius: var(--radius-md);">
                                    <p style="font-weight: 600; margin-bottom: 0.5rem; font-size: 0.875rem;">Contact:</p>
                                    <p style="margin: 0; font-size: 0.875rem;">{{ $response->contact_details }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div style="margin-top: 3rem; text-align: center;">
            <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary">
                ← Back to All Requests
            </a>
        </div>
    </div>
</section>
@endsection
