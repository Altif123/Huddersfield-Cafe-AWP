@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="flex items-center justify-center ">
            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                <img src="/images/profile_cover.jpg" class="w-full"/>
                <div class="flex justify-center -mt-8">
                    <img src="{{$user->avatar_url}}"
                         class="rounded-full border-solid border-white border-2 -mt-3">
                </div>
                @foreach($user->roles as $role)
                    @isset($role)
                        <div aria-label="role">
                            <span class="inline-flex bg-purple-600 text-white rounded-full px-3 py-1 justify-center items-center text-">{{$role->name}}</span>
                        </div>
                    @endisset
                @endforeach
                <div class="inline-flex float-right bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <form method="POST" action="{{route('profile.delete')}}">
                        <x-deleteBtn/>
                    </form>
                </div>
                <div class="text-center px-3 pb-6 pt-2">
                    <form action="{{route('profile.update',$user)}}}"
                          class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap">
                            <label for="name" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:
                            </label>

                            <input id="name" type="text"
                                   class="form-input bg-background-fourth w-full @error('name')  border-red-500 @enderror"
                                   name="name" value="{{old('name')??$user -> name}}"
                                   autofocus placeholder="{{$user->name}}" aria-label="Name">

                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email"
                                   class="form-input w-full bg-background-fourth @error('email') border-red-500 @enderror"
                                   name="email"
                                   value="{{old('email')??$user -> email}}"
                                   placeholder="{{$user->email}}" aria-label="email">

                            @error('email')
                            <p class="text-green-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password"
                                   class="form-input w-full bg-background-fourth @error('password') border-red-500 @enderror"
                                   name="password"
                                   placeholder="*********">

                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="form-input bg-background-fourth w-full"
                                   name="password_confirmation" autocomplete="new-password"
                                   placeholder="*********">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="w-full select-none bg-background-btn font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 hover:bg-blue-700 sm:py-4">
                                {{ __('Update account') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center pb-3 text-grey-dark">
                </div>
            </div>
        </div>
    </main>
@endsection