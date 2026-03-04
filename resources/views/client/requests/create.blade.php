@extends('layouts.app')

@section('title', 'Create Request')

@section('content')
<section style="padding: 3rem 0; background: var(--white);">
    <div class="container container-narrow">
        <!-- Header -->
        <div class="text-center" style="margin-bottom: 3rem;" data-aos="fade-up">
            <h2 class="text-gradient">Create New Event Request</h2>
            <p style="font-size: 1.125rem; color: var(--gray-700);">Tell us about your event and connect with perfect vendors</p>
        </div>

        <!-- Form Card -->
        <div class="card" data-aos="fade-up">
            <form action="{{ route('client.requests.store') }}" method="POST" id="requestForm">
                @csrf

                <!-- Event Date -->
                <div style="margin-bottom: 2rem;">
                    <label for="event_date" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--primary-dark);">
                        📅 Event Date
                    </label>
                    <input type="date" name="event_date" id="event_date" required
                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                           style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem; font-family: var(--font-primary); transition: all var(--transition-base);"
                           onfocus="this.style.borderColor='var(--primary-gold)'"
                           onblur="this.style.borderColor='var(--gray-300)'">
                    @error('event_date')
                        <p style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Selection -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 1rem; color: var(--primary-dark);">
                        🎯 Select Services Needed
                    </label>
                    <div id="categoryContainer">
                        <div class="category-item" style="background: var(--gray-50); border: 2px dashed var(--gray-300); border-radius: var(--radius-lg); padding: 1.5rem; margin-bottom: 1.5rem;">
                            <div class="grid grid-2" style="gap: 1rem;">
                                <div>
                                    <label style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--gray-700);">Service Category</label>
                                    <select name="categories[0][category_id]" style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem;" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--gray-700);">Budget Range</label>
                                    <select name="categories[0][price_range_id]" style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem;" required>
                                        <option value="">Select Budget</option>
                                        @foreach($priceRanges as $range)
                                            <option value="{{ $range->id }}">{{ $range->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="addCategory" class="btn btn-secondary">
                        ➕ Add Another Service
                    </button>
                </div>

                <div style="display: flex; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                    <button type="submit" class="btn btn-primary btn-lg" style="flex: 1;">
                        🚀 Submit Request
                    </button>
                    <a href="{{ route('client.requests.index') }}" class="btn btn-outline" style="flex: 1; background: var(--gray-100); color: var(--gray-700); border: 2px solid var(--gray-300);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script>
    let categoryIndex = 1;
    const categories = @json($categories);
    const priceRanges = @json($priceRanges);

    document.getElementById('addCategory').addEventListener('click', function() {
        const container = document.getElementById('categoryContainer');
        const newItem = document.createElement('div');
        newItem.className = 'category-item';
        newItem.style.cssText = 'background: var(--gray-50); border: 2px dashed var(--gray-300); border-radius: var(--radius-lg); padding: 1.5rem; margin-bottom: 1.5rem;';
        newItem.innerHTML = `
            <div class="grid grid-2" style="gap: 1rem;">
                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--gray-700);">Service Category</label>
                    <select name="categories[${categoryIndex}][category_id]" style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem;" required>
                        <option value="">Select Category</option>
                        ${categories.map(cat => `<option value="${cat.id}">${cat.name}</option>`).join('')}
                    </select>
                </div>
                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--gray-700);">Budget Range</label>
                    <select name="categories[${categoryIndex}][price_range_id]" style="width: 100%; padding: 0.875rem; border: 2px solid var(--gray-300); border-radius: var(--radius-lg); font-size: 1rem;" required>
                        <option value="">Select Budget</option>
                        ${priceRanges.map(range => `<option value="${range.id}">${range.label}</option>`).join('')}
                    </select>
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="button" onclick="this.closest('.category-item').remove()" style="color: var(--error); background: none; border: none; cursor: pointer; font-weight: 500;">🗑️ Remove Service</button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        categoryIndex++;
    });
</script>
@endpush
@endsection
