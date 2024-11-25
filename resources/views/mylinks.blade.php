<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Links') }}
        </h2>
    </x-slot>
    <div>

        <div class="bg-gray-800 text-white rounded-md">
            <x-community-links :links="$links" />
        </div>
    </div>
</x-app-layout>