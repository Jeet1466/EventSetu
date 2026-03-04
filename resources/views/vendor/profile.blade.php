@extends('layouts.app')

@section('title', 'Update Profile')

@section('content')
<section style="padding: 3rem 0; background: var(--primary-cream);">
    <div class="container container-narrow">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">Update Vendor Profile</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Set your category and price range to receive matched requests</p>
        </div>

        <!-- Info Card -->
        <div class="card" data-aos="fade-up" style="margin-bottom: 2rem; background: linear-gradient(135deg, #DBEAFE, #FEF3C7); border-left: 4px solid var(--info);">
            <p style="margin: 0; color: var(--primary-dark);">
                <strong>💡 How it works:</strong> Once you set your service category and price range, you'll automatically receive requests that match your expertise. Clients won't see your personal details until you accept a request.
            </p>
        </div>

        <!-- Form Card -->
        <div class="card" data-aos="fade-up">
            <form action="{{ route('vendor.profile.update') }}" method="POST">
                @csrf

                <div style="margin-bottom: 2rem;">
                    <label for="vendor_category_id" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        🎯 Service Category
                    </label>
                    <select name="vendor_category_id" id="vendor_category_id" required
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary); background: white;"
                            onfocus="this.style.borderColor='var(--primary-gold)'"
                            onblur="this.style.borderColor='var(--gray-300)'">
                        <option value="">Select Your Service Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ auth()->user()->vendor_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} - {{ $category->description }}
                            </option>
                        @endforeach
                    </select>
                    @error('vendor_category_id')
                        <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 2rem;">
                    <label for="price_range_id" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        💰 Your Price Range
                    </label>
                    <select name="price_range_id" id="price_range_id" required
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary); background: white;"
                            onfocus="this.style.borderColor='var(--primary-gold)'"
                            onblur="this.style.borderColor='var(--gray-300)'">
                        <option value="">Select Your Price Range</option>
                        @foreach($priceRanges as $range)
                            <option value="{{ $range->id }}" 
                                {{ auth()->user()->price_range_id == $range->id ? 'selected' : '' }}>
                                {{ $range->label }}
                            </option>
                        @endforeach
                    </select>
                    @error('price_range_id')
                        <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: flex; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                    <button type="submit" class="btn btn-primary btn-lg" style="flex: 1;">
                        💾 Save Profile
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
