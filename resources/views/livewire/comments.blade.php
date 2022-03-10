<div>
    <div class="flex items-start justify-center">
        <form class="w-full" wire:submit.prevent="postComment">
            <textarea name="comment" id="comment" wire:model.defer="newCommentState.body" class="text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Leave a comment!"></textarea>
            <button type="submit" class="justify-items-start btn rounded-full m-3">Comment</button>
        </form>
        @error('newCommentState.body')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <ul class="block w-11/12 my-4 mx-auto" x-data="{selected:null}">
        <li class="flex align-center flex-col">
            <hr class="my-3 text-gray-900">
            <div class="flex justify-between mx-16">
                <h4 @click="selected !== 0 ? selected = 0 : selected = null" class="text-gray-600 cursor-pointer">Views</h4>
                <h4 @click="selected !== 1 ? selected = 1 : selected = null" class="text-gray-600 cursor-pointer">Comments</h4>
                <h4 @click="selected !== 2 ? selected = 2 : selected = null" class="text-gray-600 cursor-pointer">Popularity</h4>
            </div>
            <hr class="my-3 text-gray-900">
            <div x-show="selected == 0" class="py-4 px-2 text-gray-600">
                This are views
            </div>
            <div x-show="selected == 1" class="py-4 px-2 text-gray-600">
                @forelse($comments as $comment)
                    <livewire:comment :comment="$comment" :key="$comment->id"/>
                    <hr class="my-3 text-gray-900">
                @empty
                    <p class="text-gray-900">No comments yet</p>
                @endforelse
            </div>
            <div x-show="selected == 2" class="py-4 px-2 text-gray-600">
                This is the popularity
            </div>
        </li>
    </ul>
</div>
