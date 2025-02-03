@props(['product'])

<div class="product-display-container">
    <div class="product-image-container">
        @if (!empty($product->images) && is_array(json_decode($product->images, true)))
            <img src="{{ asset('storage/' . json_decode($product->images, true)[0]) }}" alt="{{ $product->name }}">
        @else
            <img src="{{ asset('images/no-image.png') }}" alt="No Image Available">
        @endif
    </div>

    <div class="product-details-container">
        <h2 class="product-title">{{ $product->name }}</h2>
        <p class="product-price">Rs.{{ number_format($product->price, 2) }}</p>
        <p class="product-description">{{ $product->description }}</p>

        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <div class="quantity-and-cart">
                <label for="size" class="block mb-1 text-sm font-medium text-gray-700">Size:</label>
                <input type="text" name="size" id="size" value="{{ $product->size }}" readonly
                    class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">

                <label for="color" class="block mb-1 text-sm font-medium text-gray-700">Color:</label>
                <input type="text" name="color" id="color" value="{{ $product->color }}" readonly
                    class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">

                <label for="quantity" class="block mb-1 text-sm font-medium text-gray-700">Quantity:</label>
                <input type="number" name="quantity" min="1" max="10" value="1" class="product-quantity">

                <button type="submit" class="px-4 py-2 mt-3 text-white bg-blue-500 rounded-md add-to-cart-btn hover:bg-blue-700">
                    Add to Cart
                </button>
            </div>
        </form>

        <ul class="mt-4 product-meta">
            <li><strong>SKU:</strong> {{ $product->id }}</li>
            <li><strong>Category:</strong> {{ $product->category->name }}</li>
            <li><strong>Tags:</strong> Crafts, Pottery, Homemade</li>
        </ul>
    </div>
</div>

<style>
    .product-display-container {
        display: flex;
        gap: 20px;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .product-image-container img {
        max-width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    .product-details-container {
        flex: 1;
    }

    .product-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 20px;
        color: #FF5722;
        margin-bottom: 10px;
    }

    .product-description {
        margin-bottom: 15px;
        font-size: 16px;
    }

    .quantity-and-cart {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-top: 15px;
    }

    .product-quantity {
        width: 60px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .add-to-cart-btn {
        padding: 10px 15px;
        font-size: 16px;
        font-weight: bold;
        background: #FF5722;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .add-to-cart-btn:hover {
        background: #E64A19;
    }

    .product-meta {
        margin-top: 20px;
        font-size: 14px;
        color: #757575;
    }

    .product-meta li {
        margin-bottom: 5px;
    }
</style>
