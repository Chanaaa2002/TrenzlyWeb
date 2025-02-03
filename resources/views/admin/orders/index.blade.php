@extends('layouts.frontend')

@section('pages')

<div class="dashboard-content fade-in">
    <h2 class="text-3xl font-bold text-gray-900">Order Management</h2>

    <table class="min-w-full mt-8 bg-white rounded-lg shadow-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-6 py-3 text-left">Order ID</th>
                <th class="px-6 py-3 text-left">Customer</th>
                <th class="px-6 py-3 text-left">Total</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-6 py-3">{{ $order->id }}</td>
                <td class="px-6 py-3">{{ $order->customer_name }}</td>
                <td class="px-6 py-3">${{ $order->total }}</td>
                <td class="px-6 py-3">{{ $order->status }}</td>
                <td class="px-6 py-3">
                    <button onclick="editOrder({{ $order }})" class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Edit</button>
                    <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
