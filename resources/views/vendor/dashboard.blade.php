@extends('layouts.app')

@section('title', 'Vendor Dashboard')

@section('content')
<section style="padding: 3rem 0; background: var(--primary-cream);">
    <div class="container">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">Vendor Dashboard</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Manage your profile and respond to matched requests</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="card" style="background: var(--success); color: white; margin-bottom: 2rem;" data-aos="fade-down">
                <p style="margin:0; color: white;">✓ {{ session('success') }}</p>
            </div>
        @endif

        <!-- Vendor Profile Card -->
        <div class="card" data-aos="fade-up" style="margin-bottom: 2rem; background: linear-gradient(135deg, var(--accent-purple), var(--accent-pink)); color: white;">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <h3 style="color: white; margin-bottom: 1rem;">👤 Your Vendor Profile</h3>
                    <p style="margin-bottom: 0.5rem; color: rgba(255,255,255,0.95);">
                        <strong>Category:</strong> {{ auth()->user()->vendorCategory->name ?? 'Not Set' }}
                    </p>
                    <p style="margin: 0; color: rgba(255,255,255,0.95);">
                        <strong>Price Range:</strong> {{ auth()->user()->priceRange->label ?? 'Not Set' }}
                    </p>
                </div>
                <a href="{{ route('vendor.profile') }}" class="btn btn-outline" style="background: white; color: var(--accent-purple); border: 2px solid white;">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Incoming Requests -->
        <div style="margin-bottom: 3rem;">
            <h3 style="margin-bottom: 1.5rem;" data-aos="fade-up">🔔 Incoming Matched Requests</h3>

            @if($matchingRequests->isEmpty())
                <div class="card text-center" data-aos="fade-up">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">📭</div>
                    <h4>No Matching Requests</h4>
                    <p>You'll see requests here that match your category and price range</p>
                </div>
            @else
                <div class="grid grid-2">
                    @foreach($matchingRequests as $item)
                        <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="service-card-image" style="background: linear-gradient(135deg, #10B981, #3B82F6);">
                                🎯
                            </div>
                            <div class="service-card-content">
                                <h3 class="service-card-title">{{ $item->vendorCategory->name }}</h3>
                                
                                <div style="background: var(--gray-50); padding: 1rem; border-radius: var(--radius-md); margin: 1rem 0;">
                                    <p style="margin-bottom: 0.5rem; font-size: 0.875rem; color: var(--gray-700);"><strong>Client:</strong> {{ $item->clientRequest->user->name }}</p>
                                    <p style="margin-bottom: 0.5rem; font-size: 0.875rem; color: var(--gray-700);"><strong>📅 Event:</strong> {{ $item->clientRequest->event_date->format('M d, Y') }}</p>
                                    <p style="margin-bottom: 0; font-size: 0.875rem; color: var(--success);"><strong>💰 Budget:</strong> {{ $item->priceRange->label }}</p>
                                </div>

                                <p style="font-size: 0.75rem; color: var(--gray-500); margin-bottom: 1rem;">Created {{ $item->created_at->diffForHumans() }}</p>

                                <a href="{{ route('vendor.accept', $item->id) }}" class="btn btn-primary" style="width: 100%;">
                                    📝 Submit Proposal
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- My Responses -->
        <div>
            <h3 style="margin-bottom: 1.5rem;" data-aos="fade-up">📊 My Submitted Proposals</h3>

            @if($myResponses->isEmpty())
                <div class="card text-center" data-aos="fade-up">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📝</div>
                    <h4>No Proposals Yet</h4>
                    <p>Start responding to incoming requests to grow your business</p>
                </div>
            @else
                <div class="grid grid-3">
                    @foreach($myResponses as $response)
                        <div class="card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" style="border-left: 4px solid var(--primary-gold);">
                            <h4 style="color: var(--primary-gold); margin-bottom: 0.5rem;">{{ $response->requestItem->vendorCategory->name }}</h4>
                            <p style="font-size: 0.875rem; color: var(--gray-600); margin-bottom: 0.5rem;">
                                Client: {{ $response->requestItem->clientRequest->user->name }}
                            </p>
                            <p style="font-size: 0.875rem; color: var(--gray-600); margin-bottom: 1rem;">
                                Event: {{ $response->requestItem->clientRequest->event_date->format('M d, Y') }}
                            </p>
                            <div style="background: var(--primary-cream); padding: 1rem; border-radius: var(--radius-md);">
                                <p style="font-size: 1.25rem; font-weight: 700; color: var(--success); margin: 0;">₹{{ number_format($response->quoted_price) }}</p>
                                <p style="font-size: 0.75rem; color: var(--gray-600); margin: 0;">Your Quote</p>
                            </div>
                            <p style="font-size: 0.75rem; color: var(--gray-500); margin-top: 1rem; margin-bottom: 0;">
                                Submitted {{ $response->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
