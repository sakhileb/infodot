<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-start items-center">
            {{ __('Questions') }}
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

        <main class="bg-cover bg-base-200 w-full">
            <div class="col-span-2 px-4 overflow-y-scroll">
                <h1 class="text-white m-3 text-2xl">{{ $questions->count() }} Questions Asked</h1>
                <hr class="my-3 text-gray-900">
                <div class="container flex flex-col mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="overflow-x-auto w-full">
                        <table class="table w-full">
                            <thead></thead>
                        <tbody>
                        <!-- row 1 -->
                            @foreach($questions as $question)
                                <tr class="p-4 my-3 hover">
                                    <td class="my-2 p-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar hidden sm:block">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://via.placeholder.com/100x100" class="rounded-full" alt="Avatar Tailwind CSS Component">
                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{ route('questions.view', ['qid' => $question->id]) }}">
                                                    <div class="font-bold capitalize text-gray-800">
                                                        By: {{ $question->user->name }}
                                                    </div>
                                                    <div class="text-sm opacity-50 text-gray-400">
                                                        {{ $question->created_at->diffForHumans() }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('questions.view', ['qid' => $question->id]) }}" class=" text-gray-800">
                                            {{ $question->question }}
                                            <br>
                                            <span class="badge badge-ghost badge-sm text-gray-400">
                                                10 Views
                                            </span>
                                        </a>
                                    </td>
                                    <th class="hidden sm:block p-2 my-2 hover">
                                        <a  href="{{ route('questions.view', ['qid' => $question->id]) }}" class="btn btn-xs rounded-full">
                                            <i class="fa fa-greater-than"></i>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            <!-- foot -->
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    {{-- <ul class="flex flex-col divide divide-y">

                            <li class="flex flex-row w-full">

                                    <div class="select-none cursor-pointer flex flex-1 items-center p-4">
                                        <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                                            <img alt="profil" src="/images/person/6.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </div>
                                        <div class="flex-1 pl-1 mr-16">
                                            <div class="font-medium dark:text-white">

                                            </div>
                                            <div class="text-gray-600 dark:text-gray-200 text-sm">
                                                Developer
                                            </div>
                                        </div>
                                        <div class="text-gray-600 dark:text-gray-200 text-xs">
                                            6:00 AM
                                        </div>
                                        <button class="w-24 text-right flex justify-end">
                                            <svg width="20" fill="currentColor" height="20" class="hover:text-gray-800 dark:hover:text-white dark:text-gray-200 text-gray-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </a>
                            </li>

                    </ul> --}}
                </div>
            </div>
        </main>

        @include('partials.aside-right')
    </div>
    @include('layouts.footer')
</x-app-layout>
