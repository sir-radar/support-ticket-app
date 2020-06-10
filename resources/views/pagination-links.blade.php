@if($paginator->hasPages())
    <ul class="flex justify-between">
        @if($paginator->onFirstPage())
            <li id="offPrev" class="w-16 px-2 py-1 text-center rounder border bg-gray-200">Prev</li>
        @else
            <li id="onPrev" class="w-16 px-2 py-1 text-center rounder border shadow bg-white cursor-pointer" wire:click="previousPage">Prev</li>
        @endif

        @if($paginator->hasMorePages())
            <li id="onNext" class="w-16 px-2 py-1 text-center rounder border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li>
        @else
            <li id="offNext" class="w-16 px-2 py-1 text-center rounder border bg-gray-200">Next</li>
        @endif
    </ul>
@endif