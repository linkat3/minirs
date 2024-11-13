<div class="w-1/2 p-2 text-white rounded-md">
    @if (session('linkSend'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('linkSend') }}
    </div>
    @endif
    @if (session ('warning'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
        {{ session('warning')}}
    </div>
    @endif
</div>