<div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative" {{ $attributes }}>
        <x-r-data-thead>
            <template x-for="column in columns">
                <x-r-data-th />
            </template>
        </x-r-data-thead>
        <tbody>
        <template x-for="row in rows" :key="row.key">
            <tr class="hover:bg-orange-100 odd:bg-gray-100">
                <template x-for="column in columns">
                    <x-r-data-td />
                </template>
            </tr>
        </template>
        </tbody>
    </table>
</div>
