<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-start items-center">
            {{ __('Business Solutions') }}
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
    <div class="flex z-0">
        @include('partials.aside-left')

        <main class="bg-cover bg-base-200 w-full z-0">
            <div class="col-span-2 px-4 overflow-y-scroll">
                @foreach($solutions as $solution)
                    <div class="mx-auto sm:px-3 lg:px-4 my-6">
                        <div class="w-full px-4 py-10" >
                            <div class="card glass lg:card-side text-neutral-content">
                                <figure class="p-6">
                                    <img src="https://picsum.photos/id/1005/300/200" class="rounded-lg shadow-lg">
                                    <div class="grid grid-cols-2">
                                        <span class="flex justify-center m-4">
                                            <i class="fas fa-clock p-1"></i>
                                            {{ $solution->duration }} {{ $solution->duration_type }}
                                        </span>
                                        <span class="flex justify-center m-4">
                                            <i class="fas fa-shoe-prints p-1"></i> {{ $solution->steps }}
                                        </span>
                                    </div>
                                </figure>
                                <div class="max-w-md card-body">
                                    <h2 class="card-title capitalize">
                                        {{$solution->solution_title ?? ''}}
                                    </h2>
                                    <p class="line-clamp-3">
                                        {{ $solution->solution_description ?? '' }}
                                    </p>
                                    <div class="grid grid-cols-3">
                                        <span class="flex justify-start pt-3">
                                            <i class="fas fa-eye p-1" aria-hidden="true"></i> 3
                                        </span>
                                        <span class="flex justify-start pt-3">
                                            <i class="fa fa-comment p-1" aria-hidden="true"></i> {{ $solution->comments()->count() }}
                                        </span>
                                        <span class="flex justify-start pt-3">
                                            <i class="fa fa-bar-chart p-1" aria-hidden="true"></i> 10
                                        </span>
                                    </div>
                                    <div class="card-actions">
                                        <a class="btn glass rounded-full" href="{{ route('solutions.view', ['id' => $solution->id]) }}">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>

        @include('partials.aside-right')

    </div>
    @include('layouts.footer')
</x-app-layout>
