@extends('layouts.frontend')
@section('pages')
<div class="container py-10 mx-auto">
    <h1 class="mb-5 text-3xl font-bold">Your Cart</h1>

    @if(session('success'))
        <div class="p-4 mb-5 text-green-800 bg-green-200 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <p class="text-gray-600">Your cart is empty.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Product</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Size</th>
                    <th class="px-4 py-2 border">Color</th>
                    <th class="px-4 py-2 border">Quantity</th>
                    <th class="px-4 py-2 border"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td class="px-4 py-2 border">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16">
                    </td>
                    <td class="px-4 py-2 border">{{ $item['name'] }}</td>
                    <td class="px-4 py-2 border">Rs.{{ number_format($item['price'], 2) }}</td>
                    <td class="px-4 py-2 border">{{ $item['size'] ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">
                        <span class="block w-6 h-6 rounded-full" style="background-color: {{ $item['color'] ?? '#FFFFFF' }};"></span>
                    </td>
                    <td class="px-4 py-2 border">
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" class="w-16 p-2 border rounded-md">
                            <button type="submit" class="px-3 py-1 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">Update</button>
                        </form>
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('cart.remove', $id) }}" class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-700">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex items-center justify-between mt-5">
            <a href="{{ route('cart.checkout') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">
                Proceed to Checkout
            </a>
            <p class="text-xl font-bold">
                Total: Rs.{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}
            </p>
        </div>
    @endif
</div>
@endsection
