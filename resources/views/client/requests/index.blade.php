@extends('layouts.app')

@section('title', 'My Requests')

@section('content')
<section style="padding: 3rem 0; background: var(--primary-cream);">
    <div class="container">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">My Event Requests</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Manage all your event requests and vendor proposals</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="card" style="background: var(--success); color: white; margin-bottom: 2rem;" data-aos="fade-down">
                <p style="margin:0; color: white;">✓ {{ session('success') }}</p>
            </div>
        @endif

        <!-- Create New Request Button -->
        <div style="text-align: center; margin-bottom: 3rem;" data-aos="zoom-in">
            <a href="{{ route('client.requests.create') }}" class="btn btn-primary btn-lg">
                ➕ Create New Request
            </a>
        </div>

        <!-- Requests List -->
        @if($requests->isEmpty())
            <div class="card text-center" data-aos="fade-up">
                <div style="font-size: 4rem; margin-bottom: 1rem;">📋</div>
                <h3>No Requests Yet</h3>
                <p>Start by creating your first event request to connect with verified vendors</p>
                <a href="{{ route('client.requests.create') }}" class="btn btn-primary" style="margin-top: 1rem;">
                    Get Started
                </a>
            </div>
        @else
            <div class="grid grid-2">
                @foreach($requests as $request)
                    <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="service-card-image"
                             style="background: linear-gradient(135deg,
                                @if($request->status == 'pending') #F59E0B, #FB923C
                                @elseif($request->status == 'in_progress') #3B82F6, #8B5CF6
                                @else #10B981, #059669
                                @endif);">
                            @if($request->status == 'pending') 🕐
                            @elseif($request->status == 'in_progress') 🔄
                            @else ✅
                            @endif
                        </div>
                        <div class="service-card-content">
                            <h3 class="service-card-title" style="display: flex; justify-content: space-between; align-items: center;">
                                Event on {{ $request->event_date->format('M d, Y') }}
                                <span style="font-size: 0.75rem; padding: 0.25rem 0.75rem; border-radius: var(--radius-full);
                                    @if($request->status == 'pending') background: #FEF3C7; color: #92400E;
                                    @elseif($request->status == 'in_progress') background: #DBEAFE; color: #1E40AF;
                                    @else background: #D1FAE5; color: #065F46;
                                    @endif">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </h3>
                            
                            <div style="margin: 1.5rem 0;">
                                @foreach($request->requestItems as $item)
                                    <p style="margin-bottom: 0.5rem; color: var(--gray-600);">
                                        • <strong>{{ $item->vendorCategory->name }}:</strong> {{ $item->priceRange->label }}
                                    </p>
                                @endforeach
                            </div>

                            <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--gray-200);">
                                <p style="font-size: 0.875rem; color: var(--gray-600); margin-bottom: 1rem;">
                                    {{ $request->requestItems->sum(fn($item) => $item->vendorResponses->count()) }} vendor proposal(s) received
                                </p>
                                <a href="{{ route('client.requests.show', $request->id) }}" class="btn btn-primary" style="width: 100%;">
                                    View Details & Proposals
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
