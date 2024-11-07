@props(['links'])
<div class="flex mb-4 max-w-7xl">
    <div class="p-2 bg-gray-800 text-white rounded-md ">
        @if ($links->isEmpty())
        <p class="bg-gray-800 text-white rounded-md">{{ __("No approved contributions yet!") }}</p>
        @else
        @foreach ($links as $link)
        <li>{{$link->title}}</li>
        @if ($link->channel_id===1)
        <div>HTML</div>
        @endif
        @if ($link->channel_id===2)
        <div class="w-1/4">LARAVEL</div>
        @endif
        @if ($link->channel_id===3)
        <div>REACT</div>
        @endif
        <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>

        @endforeach
        @endif

        {{$links->links()}}

    </div>
    
</div>