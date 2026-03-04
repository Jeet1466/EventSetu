@extends('layouts.app')

@section('title', 'Submit Proposal')

@section('content')
<section style="padding: 3rem 0; background: var(--white);">
    <div class="container container-narrow">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">Submit Your Proposal</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Provide your quote and contact details to the client</p>
        </div>

        <!-- Request Details Card -->
        <div class="card" data-aos="fade-up" style="margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary-cream), var(--white));">
            <h3 style="color: var(--primary-gold); margin-bottom: 1.5rem;">📋 Request Details</h3>
            <div class="grid grid-2" style="gap: 1rem;">
                <div>
                    <p style="margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-dark);">Category:</p>
                    <p style="margin: 0; color: var(--gray-700);">{{ $requestItem->vendorCategory->name }}</p>
                </div>
                <div>
                    <p style="margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-dark);">Client Budget:</p>
                    <p style="margin: 0; color: var(--success); font-weight: 600;">{{ $requestItem->priceRange->label }}</p>
                </div>
                <div style="grid-column: 1 / -1;">
                    <p style="margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-dark);">Event Date:</p>
                    <p style="margin: 0; color: var(--gray-700);">📅 {{ $requestItem->clientRequest->event_date->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Response Form -->
        <div class="card" data-aos="fade-up">
            <form action="{{ route('vendor.response.store') }}" method="POST">
                @csrf
                <input type="hidden" name="request_item_id" value="{{ $requestItem->id }}">

                <div style="margin-bottom: 2rem;">
                    <label for="quoted_price" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        💰 Your Quote (₹)
                    </label>
                    <input type="number" name="quoted_price" id="quoted_price" required min="0" step="0.01"
                           style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1.125rem; font-weight: 600; font-family: var(--font-primary);"
                           placeholder="Enter your best price"
                           onfocus="this.style.borderColor='var(--primary-gold)'"
                           onblur="this.style.borderColor='var(--gray-300)'">
                    @error('quoted_price')
                        <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 2rem;">
                    <label for="contact_details" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        📞 Contact Details
                    </label>
                    <textarea name="contact_details" id="contact_details" required rows="3"
                              style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary); resize: vertical;"
                              placeholder="Phone, WhatsApp, Email, or other contact information"
                              onfocus="this.style.borderColor='var(--primary-gold)'"
                              onblur="this.style.borderColor='var(--gray-300)'"></textarea>
                    @error('contact_details')
                        <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror>
                </div>

                <div style="margin-bottom: 2rem;">
                    <label for="notes" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        📝 Additional Notes (Optional)
                    </label>
                    <textarea name="notes" id="notes" rows="4"
                              style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary); resize: vertical;"
                              placeholder="Tell the client about your services, experience, packages, etc."
                              onfocus="this.style.borderColor='var(--primary-gold)'"
                              onblur="this.style.borderColor='var(--gray-300)'"></textarea>
                </div>

                <div style="display: flex; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                    <button type="submit" class="btn btn-primary btn-lg" style="flex: 1;">
                        ✅ Submit Proposal
                    </button>
                    <a href="{{ route('vendor.dashboard') }}" class="btn btn-outline" style="flex: 1; background: var(--gray-100); color: var(--gray-700); border: 2px solid var(--gray-300);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
