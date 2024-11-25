<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Links') }}
        </h2>
    </x-slot>
<!-- Se ha duplicado la pagina dashboard y se modifico el titulo  -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Here you will see the Contact Page!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
