<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Links') }}
        </h2>
    </x-slot>
    <div class="w-1/2 p-2 text-white rounded-md">
        <x-community-links-flash-messages />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("The Links!") }}
                </div>
            </div>
            <div>
                <div class="bg-gray-800 text-white rounded-md">

                    <x-community-links :links="$links" />
                    <x-community-add-link :channels="$channels" />


                </div>
            </div>
        </div>
    </div>
</x-app-layout>