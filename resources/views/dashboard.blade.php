<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Here you will see the Community Links!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-2">
        <div class="bg-gray-800 text-white rounded-md">
            @foreach ($links as $link)
            <li>{{$link->title}}</li>
            @endforeach
            {{$links->links()}}
        </div>
        <div>
            <div class="bg-gray-800 text-white rounded-md">

                <x-community-links :links="$links" />
                <x-community-add-link :channels="$channels" />


            </div>
        </div>
    </div>

    <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>

    <div class="px-2 py-1"> <h3>Lista de Canales</h3>
        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded" style="background-color: {{ $link->channel->color }}"> {{ $link->channel->title }}
        </span>
        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded" style="background-color: {{ $link->channel->color }}"> {{ $link->channel->title }}
        </span>
    </div>
</x-app-layout>