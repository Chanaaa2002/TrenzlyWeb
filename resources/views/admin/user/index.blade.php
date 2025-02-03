@extends('layouts.frontend')

@section('pages')

<div class="dashboard-content fade-in">
    <h2 class="text-3xl font-bold text-gray-900">User Management</h2>

    <table class="min-w-full mt-8 bg-white rounded-lg shadow-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-6 py-3 text-left">User ID</th>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Role</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-6 py-3">{{ $user->id }}</td>
                <td class="px-6 py-3">{{ $user->name }}</td>
                <td class="px-6 py-3">{{ $user->email }}</td>
                <td class="px-6 py-3">{{ $user->role }}</td>
                <td class="px-6 py-3">
                    <button onclick="editUser({{ $user }})" class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Edit</button>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
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
