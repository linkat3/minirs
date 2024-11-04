@props(['links'])
<div class="flex mb-4 max-w-7xl">
    <div class="w-1/2 p-2 bg-gray-800 text-white rounded-md ">
        @if ($links->isEmpty())
        <p class="bg-gray-800 text-white rounded-md">{{ __("No approved contributions yet!") }}</p>
        @else
        @foreach ($links as $link)
        <li>{{$link->title}}</li>
        <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>

        @endforeach
        @endif

        {{$links->links()}}

    </div>
    <div class="w-1/2 p-2 text-white rounded-md">
        @if (session('linkSend'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('linkSend') }}
        </div>
        @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
            Pendiente de aprobación
        </div>
        @endif
    </div>
</div>