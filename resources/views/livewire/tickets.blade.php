<div>
    <div>
        @if(session()->has('ticketMessage'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('ticketMessage') }}
            </div>
        @endif
    </div>
    <h1 class="text-3xl">Support Tickets</h1>
    @if($tickets->isEmpty())
        <h6 class="mt-5 text-center">No ticket available, please create one.</h6>
    @endif
    @foreach ($tickets as $ticket)
        <div
            class="rounded border shadow p-3 my-2 cursor-pointer {{$active == $ticket->id ? 'bg-green-200' : ''}}" 
            wire:click="$emit('ticketSelected', {{ $ticket->id }})"
            >
            <p class="text-gray-800">{{$ticket->question}}</p>
        </div>
    @endforeach
    <button wire:click="$emit('addTicket')" class="absolute bottom-0 right-0 h-12 w-12 rounded-full bg-blue-500 text-white">+</button>
    @if($showModal)
        <livewire:add-ticket/>
    @endif
</div>

