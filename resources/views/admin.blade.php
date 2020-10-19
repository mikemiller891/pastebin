<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <a href="{{ route('users.index') }}">
                    <div
                        class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white"
                    >
                        <div class="p-4 flex items-center">
                            <div
                                class="p-3 rounded-full text-red-500 bg-red-100 mr-4"
                            >
                                <x-heroicon-s-users class="h-6 w-6"/>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total users
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ App\Models\User::all()->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('pastes.index') }}">
                    <div
                        class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white"
                    >
                        <div class="p-4 flex items-center">
                            <div
                                class="p-3 rounded-full text-green-500 bg-green-100 mr-4"
                            >
                                <x-heroicon-s-document-text class="h-6 w-6"/>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total pastes
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                     {{ App\Models\Paste::all()->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
