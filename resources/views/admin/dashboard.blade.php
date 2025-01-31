@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="float-right breadcrumb-title">
        <h2>Trenzly's Admin Dashboard</h2>
    </div>
    
    <div class="mb-4 text-sm">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" class="text-customGray hover:underline"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Sign out') }} <i class="ml-1 fa-solid fa-arrow-right-from-bracket"></i>
            </x-dropdown-link>
        </form>
    </div>
</div>