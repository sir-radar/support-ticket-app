<div wire:click.self="$emit('closeModal')" class="modal fixed z-20 top-0 bottom-0 right-0 left-0 py-24 bg-black bg-opacity-75 flex justify-center align-middle">
    <div class="w-1/2 p-12 bg-gray-200 relative">
        <textarea wire:model.debounce.500="question" class="p-4 w-full h-1/2 max-h-full" name="" id="" placeholder="Write your question"></textarea>
        <div class="flex justify-center mt-10">
            <button wire:click="submit" class="p-2 rounded bg-blue-500 text-white">Submit</button>
        </div>
    </div>
</div>