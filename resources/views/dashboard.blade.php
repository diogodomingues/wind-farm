<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wind Farm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to the Wind Farm main Dashboard.") }}
                    {{ __("Please Select some options from the navigation bar to operate.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
