<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-start items-center">
            {{ __('Read Question') }}
            </h2>
            <div>
                <a href="{{ route('seek') }}" class="justify-items-end btn rounded-full">
                    <i class="fa fa-search mr-1" aria-hidden="true"></i> Seek
                </a>
                <a href="{{ route('create_solution') }}" class="justify-items-end btn rounded-full">
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i> Add
                </a>
            </div>
        </div>
    </x-slot>
    <div class="flex">
        @include('partials.aside-left')

        <main class="w-full">
            @php
                $user = \App\Models\User::where('id', $question->user_id)->first() ?? '';
            @endphp
            <div class="px-4 overflow-y-scroll">
                <h1 class="text-gray-900 m-3 text-2xl">Question By {{ $user->name }}</h1>
                <hr class="my-3 text-gray-900">
                    <h3 class="text-lg m-3 font-medium text-gray-900 capitalize">
                        Title: {{ $question->question }}</h3>
                    <p class="m-3 text-sm text-gray-600">
                        Description: {{ $question->description }}
                    </p>
                    <livewire:comments :model="$question" />
                    <div class="px-4 sm:px-0"></div>
            </div>
        </main>

        @include('partials.aside-right')
    </div>
    @include('layouts.footer')
</x-app-layout>
