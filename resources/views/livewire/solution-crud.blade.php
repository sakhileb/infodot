<div class="justify-end mr-5">
    <ul class="flex inline-block">
        <li class="list-items mx-3">
            <button href="#" wire:click="editSolution">
                <i class="fa fa-pen hover:text-blue-500"></i>
            </button>
        </li>
        <li class="list-items mx-3">
            <a href="#" wire:click.prevent="deleteSolution" wire:loading.attr="disabled">
                <i class="fa fa-trash hover:text-red-500"></i>
            </a>
        </li>
    </ul>
    <x-jet-dialog-modal wire:model="editSolution" wire:key="'custom-edit-modal-'.time()">
        <x-slot name="title">
            {{ __('Edit Solution') }}
        </x-slot>
        <form method="POST" wire:submit.prevent="eSolution" onkeydown="return event.key != 'Enter';">
            <x-slot name="content">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="solution_title">Solution Title:</label>
                        <input class="appearance-none block w-full input input-bordered" name="solution_title" id="solution_title" type="text" placeholder="How to......?" wire:model="solution.solution_title">
                        @if($errors->has('solution_title'))
                            <div class="text-red-500">{{ $errors->first('solution_title') }}</div>
                        @endif
                    </div>
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Solution Description:
                        </label>
                        <textarea class="textarea h-24 textarea-bordered w-full" name="solution_description" placeholder="This solution will help you accomplish 1..2..3..." wire:model="solution.solution_description"></textarea>
                        @if($errors->has('solution_description'))
                            <div class="text-red-500">{{ $errors->first('solution_description') }}</div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Tags: <span class="text-red-500">(Note: Do not remove the first tag)</span></label>
                        <div class="appearance-none block w-full input input-bordered tags-input" data-name="tags" wire:model="solution.tags"></div>
                        @if($errors->has('tags'))
                            <div class="text-red-500">{{ $errors->first('tags') }}</div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">Duration:</label>
                        <input class="appearance-none block w-full input input-bordered" name="duration" id="grid-city" type="number" placeholder="1" wire:model="solution.duration">
                        @if($errors->has('duration'))
                            <div class="text-red-500">{{ $errors->first('duration') }}</div>
                        @endif
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">Duration Type:</label>
                        <div class="relative">
                            <select class="appearance-none block w-full input input-bordered" name="duration_type" id="grid-state" wire:model="solution.duration_type">
                                <option value="hours">Hours</option>
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months">Months</option>
                                <option value="years">Years</option>
                                <option value="infinite">Unknown</option>
                            </select>
                            @if($errors->has('duration_type'))
                                <div class="text-red-500">{{ $errors->first('duration_type') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">Estimated Steps:</label>
                        <input class="appearance-none block w-full input input-bordered" name="steps" id="grid-zip" type="number" placeholder="12" wire:model="solution.steps">
                        @if($errors->has('steps'))
                            <div class="text-red-500">{{ $errors->first('steps') }}</div>
                        @endif
                    </div>
                </div>
                {{-- <div id="steps">
                    <hr class="my-3 text-gray-900">
                        <h4 class="text-gray-900 m-3 text-2xl">Step 1:</h4>
                    <hr class="my-3 text-gray-900">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="solution_title">Heading:</label>
                            <input class="appearance-none block w-full input input-bordered" name="solution_heading[]" id="solution_heading" type="text" placeholder="How to......?" wire:model="solution.solution_heading[]">
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Body:
                            </label>
                            <textarea class="textarea h-24 textarea-bordered w-full" name="solution_body[]" placeholder="This solution will help you accomplish 1..2..3..." wire:model="solution.solution_body[]"></textarea>
                        </div>
                    </div>
                </div> --}}
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-button class="text-center bg-gray-900 text-white active:bg-gray-700 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" onclick="add_steps();" id="more_fields" >
                    {{ __('Add Step') }}
                </x-jet-button> --}}

                <x-jet-button class="text-center bg-gray-900 text-white active:bg-gray-700 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" wire:click="$toggle('editSolution', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-button>

                <x-jet-button class="text-center bg-gray-900 text-white active:bg-gray-700 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" wire:click="eSolution({{ $solution->id }})" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="deleteSolution" wire:key="'custom-delete-modal-'.time()">
        <x-slot name="title">
            {{ __('Delete Solution') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this solution? This action can not be undone.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteSolution', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delSolution({{ $solution->id }})" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
