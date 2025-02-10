@extends('layouts.frontend')

@section('pages')

<div class="min-h-screen px-8 py-10 bg-gray-100 dashboard-content fade-in">
    <h2 class="mb-6 text-4xl font-extrabold text-gray-800">User Management</h2>

    <table class="w-full overflow-hidden bg-white rounded-lg shadow-lg">
        <thead class="text-white bg-gradient-to-r from-blue-500 to-indigo-600">
            <tr>
                <th class="px-6 py-3 font-semibold text-left uppercase">User ID</th>
                <th class="px-6 py-3 font-semibold text-left uppercase">Name</th>
                <th class="px-6 py-3 font-semibold text-left uppercase">Email</th>
                <th class="px-6 py-3 font-semibold text-left uppercase">Role</th>
                <th class="px-6 py-3 font-semibold text-left uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="transition duration-300 border-b last:border-0 bg-gray-50 hover:bg-gray-100">
                <td class="px-6 py-3 text-gray-700">{{ $user->id }}</td>
                <td class="px-6 py-3 font-medium text-gray-700">{{ $user->name }}</td>
                <td class="px-6 py-3 text-gray-600">{{ $user->email }}</td>
                <td class="px-6 py-3">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold 
                        {{ $user->role == 'admin' ? 'bg-green-200 text-green-800' : 'bg-blue-200 text-blue-800' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td class="flex px-6 py-3 space-x-3">
                    <button onclick="editUser({{ $user }})"
                        class="px-4 py-2 text-sm font-bold text-white transition duration-300 bg-yellow-500 rounded-md hover:bg-yellow-600">
                        Edit
                    </button>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            class="px-4 py-2 text-sm font-bold text-white transition duration-300 bg-red-500 rounded-md hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
