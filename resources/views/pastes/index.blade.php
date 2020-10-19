<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="antialiased sans-serif bg-gray-200">
                <div class="container mx-auto py-6 px-4">
                    <h1 class="text-3xl py-4 border-b mb-10">Pastes</h1>
                    <x-r-data-table x-data="datatable()" x-cloak />
                </div>
            </div>
        </div>
    </div>

    <script>
        function datatable() {
            return {
                columns: [
                    {
                        'caption': 'Key',
                        'key': 'key'
                    },
                    {
                        'caption': 'Content',
                        'key': 'content'
                    },
                    {
                        'caption': 'Created',
                        'key': 'createdAt'
                    },
                ],
                rows: [
                    @foreach ($pastes as $paste)
                    {
                        "key": "{!! addslashes($paste->key) !!}",
                        "content": "{!!  addslashes(substr($paste->content, 0, 100)) !!}",
                        "createdAt": "{{ $paste->created_at }}",
                    },
                    @endforeach
                ]
            }
        }
    </script>

</x-app-layout>
