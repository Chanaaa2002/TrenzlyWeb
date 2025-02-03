@props(['product'])

<div class="product-item">
    <a href="{{ route('pages.product-display', ['id' => $product->id]) }}" class="card">
        <div class="image-container">
            @if (!empty($product->images) && is_array(json_decode($product->images, true)))
                <img src="{{ asset('storage/' . json_decode($product->images, true)[0]) }}" alt="{{ $product->name }}">
            @else
                <img src="{{ asset('images/no-image.png') }}" alt="No Image Available">
            @endif
        </div>
        <div class="product-details">
            <h3>{{ $product->name }}</h3>
            <p class="category">{{ $product->category->name }}</p>
            <p class="price">${{ $product->price }}</p>
        </div>
    </a>
</div>

<style>
    .product-item {
        width: 250px;
        margin: 15px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
    }

    .product-item:hover {
        transform: scale(1.05);
    }

    .image-container {
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 10px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .product-details {
        margin-top: 10px;
    }

    .product-details h3 {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .product-details .category {
        color: #757575;
    }

    .product-details .price {
        color: #FF5722;
        font-weight: bold;
    }
</style>
