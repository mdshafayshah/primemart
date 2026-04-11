@extends('layout/layout')

@section('content')

<div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="/images/slider1.jpg" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="/images/slider2.jpg" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="/images/slider3.jpg" class="d-block w-100">
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container mt-5">

    @foreach($categories as $category)

    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
        <h3>{{ $category->name }}</h3>
        <a href="#" class="btn btn-sm btn-primary">View More</a>
    </div>

    <div class="row">
        @foreach($category->products as $product)
        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top">

                <div class="card-body text-center">
                    <h6>{{ $product->name }}</h6>
                    <p>Rs: {{ $product->price }}</p>
                </div>
                <div class="d-flex justify-content-between mt-2 mb-2 px-2">
                    <form action="" method="POST" style="width: 48%;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-outline-primary w-100">
                            <i class="fa fa-cart-plus"></i> Cart
                        </button>
                    </form>

                    <form action="" method="POST" style="width: 48%;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-success w-100">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endforeach

</div>

<script>
(function () {
    // Reveal on scroll — pure IntersectionObserver, zero dependencies
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var delay = el.style.getPropertyValue('--delay') || '0ms';
                setTimeout(function () {
                    el.classList.add('revealed');
                }, parseInt(delay));
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
 
    document.querySelectorAll('.reveal-up, .reveal-card').forEach(function (el) {
        observer.observe(el);
    });
})();
</script>



@endsection