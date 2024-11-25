@props(['links'])
<div class="flex m-4 max-w-7xl mx-auto justify-center items-center border-white border-2 rounded-lg">
    <div class="p-2 bg-gray-800 text-white rounded-md ">
        @if ($links->isEmpty())
        <p class="bg-gray-800 text-white rounded-md">{{ __("No approved contributions yet!") }}</p>
        @else
        @foreach ($links as $link)
        <div class="flex items-center mb-2">
            <li class="flex-1 mr-2">{{$link->title}}</li>
            <small class="ml-2 text-sm">Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
            <div class="flex space-x-2">
                @if ($link->channel_id === 1)
                <span class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-2 m-2 rounded">HTML</span>
                @endif
                @if ($link->channel_id === 2)
                <span class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 m-2 rounded">LARAVEL</span>
                @endif
                @if ($link->channel_id === 3)
                <span class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 px-2 m-2 rounded">REACT</span>
                @endif
            </div>
        </div>
        @endforeach
        @endif
        {{$links->links()}}
    </div>
</div>