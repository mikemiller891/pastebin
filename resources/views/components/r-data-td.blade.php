<x-r-td>
    <span class="text-gray-700 px-6 py-3 flex items-center">
        <span x-text="row[column.key]" x-show="column.type!='checkbox'"></span>
        <x-heroicon-s-check class="h-6 w-6" x-show="column.type=='checkbox' && row[column.key] == 1"/>
    </span>
</x-r-td>
