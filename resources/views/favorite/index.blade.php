@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                     role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:mt-10 sm:text-6xl">
                Favorites
            </h1>
            <x-backBtn/>
            <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-2  bg-background-third rounded-md">
                @foreach($favorites as $item)
                    @include('_partials.itemCard')
                @endforeach
            </div>
        </div>
        </div>

    </main>
@endsection