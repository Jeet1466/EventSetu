@extends('layouts.app')

@section('title', 'Request Details')

@section('content')
<section style="padding: 3rem 0; background: var(--white);">
    <div class="container">
        <!-- Header -->
        <div data-aos="fade-up" style="margin-bottom: 3rem;">
            <h2 class="text-gradient">Request Details</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">View all vendor proposals for your event</p>
        </div>

        <!-- Request Info Card -->
        <div class="card" data-aos="fade-up" style="margin-bottom: 2rem;">
            <h3 style="display: flex; justify-content: space-between; align-items: center;">
                📅 Event on {{ $request->event_date->format('M d, Y') }}
                <span style="font-size: 0.875rem; padding: 0.5rem 1rem; border-radius: var(--radius-full);
                    @if($request->status == 'pending') background: #FEF3C7; color: #92400E;
                    @elseif($request->status == 'in_progress') background: #DBEAFE; color: #1E40AF;
                    @else background: #D1FAE5; color: #065F46;
                    @endif">
                    {{ ucfirst($request->status) }}
                </span>
            </h3>
        </div>

        <div class="grid grid-2" style="align-items: start;">
            <!-- Requested Services -->
            <div data-aos="fade-right">
                <h3 style="margin-bottom: 1.5rem;">Requested Services</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($request->requestItems as $item)
                        <div class="card" style="background: linear-gradient(135deg, var(--primary-cream), var(--white));">
                            <h4 style="color: var(--primary-gold); margin-bottom: 0.5rem;">{{ $item->vendorCategory->name }}</h4>
                            <p style="margin-bottom: 0.5rem;"><strong>Budget:</strong> {{ $item->priceRange->label}}</p>
                            <p style="margin: 0; font-size: 0.875rem; color: var(--success);">
                                ✓ {{ $item->vendorResponses->count() }} vendor response(s)
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Vendor Proposals -->
            <div data-aos="fade-left">
                <h3 style="margin-bottom: 1.5rem;">💼 Vendor Proposals</h3>
                @php
                    $allResponses = $request->requestItems->flatMap->vendorResponses;
                @endphp

                @if($allResponses->isEmpty())
                    <div class="card text-center">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">⏳</div>
                        <h4>No Proposals Yet</h4>
                        <p style="color: var(--gray-600);">Vendors will start responding soon. Check back later!</p>
                    </div>
                @else
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        @foreach($allResponses as $response)
                            <div class="service-card">
                                <div class="service-card-image" style="background: linear-gradient(135deg, var(--accent-purple), var(--accent-pink)); height: 120px;">
                                    <span style="font-size: 3rem;">👤</span>
                                </div>
                                <div class="service-card-content">
                                    <div style="display: flex; justify-content: space-between; align-items-start; margin-bottom: 1rem;">
                                        <div>
                                            <h4 class="service-card-title">{{ $response->vendor->name }}</h4>
                                            <p style="color: var(--gray-600); margin: 0;">{{ $response->requestItem->vendorCategory->name }}</p>
                                        </div>
                                        <div style="text-align: right;">
                                            <p style="font-size: 1.75rem; font-weight: 700; color: var(--success); margin: 0;">₹{{ number_format($response->quoted_price) }}</p>
                                        </div>
                                    </div>
                                    
                                    <div style="background: var(--primary-cream); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                                        <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">📞 Contact Details:</p>
                                        <p style="margin: 0;">{{ $response->contact_details }}</p>
                                    </div>

                                    @if($response->notes)
                                        <div style="background: var(--gray-50); padding: 1rem; border-radius: var(--radius-md);">
                                            <p style="font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">📝 Additional Notes:</p>
                                            <p style="margin: 0;">{{ $response->notes }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div style="margin-top: 3rem; text-align: center;">
            <a href="{{ route('client.requests.index') }}" class="btn btn-secondary">
                ← Back to My Requests
            </a>
        </div>
    </div>
</section>
@endsection
