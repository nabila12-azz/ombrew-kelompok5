@extends('layouts.app')

@section('content')

<!-- MENU BANNER -->
<section class="menu-banner">
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/baner.png') }}" alt="Om Brew Banner" class="menu-banner-img">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/baner2.png') }}" alt="Om Brew Banner 2" class="menu-banner-img">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/baner3.png') }}" alt="Om Brew Banner 3" class="menu-banner-img">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
        </div>
    </div>
</section>

<!-- CATEGORY MENU -->
<section class="category-section">
    <div class="container">
        <div class="category-wrapper">
            <a href="#" class="category-item active" data-filter="all">
                <div class="category-icon"><i class="bi bi-grid-fill"></i></div>
                <span>All</span>
            </a>
            @foreach($categories as $cat)
            <a href="#" class="category-item" data-filter="{{ $cat->id }}">
                <div class="category-icon">
                    <i class="bi bi-{{ $cat->icon ?? 'tag' }}"></i>
                </div>
                <span>{{ $cat->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- PRODUCT SECTION -->
<section class="product-section">
    <div class="container">
        <div class="product-header">
            <h2>Product</h2>
            <a href="{{ route('menu') }}" class="see-all">
                See All <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4" id="productGrid">
            @forelse($products as $product)
            <div class="col-lg-4 col-md-6 product-item" data-category="{{ $product->category_id }}">
                <div class="product-card">
                    <div class="product-image">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                        @endif
                    </div>
                    <div class="product-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ Str::limit($product->description, 40) }}</p>
                        <div class="product-price-rating">
                            <span class="price">Rp {{ number_format($product->price,0,',','.') }}</span>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @else
                                        <i class="bi bi-star text-warning"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox fs-1 text-muted"></i>
                <p class="text-muted mt-2">Belum ada menu tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.category-item').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('.category-item').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const filter = this.dataset.filter;
        document.querySelectorAll('.product-item').forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
@endpush