@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section style="padding: 3rem 0; background: var(--primary-cream);">
    <div class="container">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">Admin Dashboard</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Manage all client requests and vendor responses</p>
        </div>

        <!-- Requests List -->
        @if($requests->isEmpty())
            <div class="card text-center" data-aos="fade-up">
                <div style="font-size: 4rem; margin-bottom: 1rem;">📊</div>
                <h3>No Requests Yet</h3>
                <p>Waiting for clients to create their first event requests</p>
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
                            👥
                        </div>
                        <div class="service-card-content">
                            <div style="margin-bottom: 1rem;">
                                <h3 class="service-card-title">{{ $request->user->name }}</h3>
                                <p style="color: var(--gray-600); margin: 0;">{{ $request->user->email }}</p>
                            </div>

                            <div style="background: var(--gray-50); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                                <p style="margin-bottom: 0.5rem;"><strong>📅 Event Date:</strong> {{ $request->event_date->format('M d, Y') }}</p>
                                <p style="margin: 0;">
                                    <span style="padding: 0.25rem 0.75rem; border-radius: var(--radius-full); font-size: 0.75rem;
                                        @if($request->status == 'pending') background: #FEF3C7; color: #92400E;
                                        @elseif($request->status == 'in_progress') background: #DBEAFE; color: #1E40AF;
                                        @else background: #D1FAE5; color: #065F46;
                                        @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </p>
                            </div>

                            <div style="margin-bottom: 1.5rem;">
                                <h4 style="font-size: 0.875rem; text-transform: uppercase; color: var(--primary-gold); margin-bottom: 0.75rem;">Services Requested:</h4>
                                @foreach($request->requestItems as $item)
                                    <p style="margin-bottom: 0.5rem; font-size: 0.875rem; color: var(--gray-600);">
                                        • {{ $item->vendorCategory->name }}: {{ $item->priceRange->label }}
                                    </p>
                                @endforeach
                            </div>

                            <a href="{{ route('admin.requests.show', $request->id) }}" class="btn btn-primary" style="width: 100%;">
                                View Full Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
