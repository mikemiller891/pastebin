<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @can('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-r-scorecards />
            <div class="antialiased sans-serif bg-gray-200">
                <div class="container mx-auto py-6 px-4">
                    <h1 class="text-3xl py-4 border-b mb-10">Users</h1>
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
                        'caption': 'User Id',
                        'key': 'key'
                    },
                    {
                        'caption': 'Name',
                        'key': 'name'
                    },
                    {
                        'caption': 'Email',
                        'key': 'email'
                    },
                    {
                        'caption': 'Admin',
                        'key': 'isAdmin',
                        'type': 'checkbox',
                    },
                    {
                        'caption': 'Verified',
                        'key': 'emailVerifiedAt'
                    },
                    {
                        'caption': 'Created',
                        'key': 'createdAt'
                    },
                ],
                rows: [
                    @foreach ($users as $user)
                    {
                        "key": {{ $user->id }},
                        "name": "{!! addslashes($user->name) !!}",
                        "email": "{!! addslashes($user->email) !!}",
                        "isAdmin": "{{ $user->is_admin }}",
                        "emailVerifiedAt": "{{ $user->email_verified_at }}",
                        "createdAt": "{{ $user->created_at }}",
                    },
                    @endforeach
                ]
            }
        }
    </script>
    @endcan
</x-app-layout>
