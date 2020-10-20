<a href="{{ $href }}">
    <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white">
        <div class="p-4 flex items-center">
            <div class="p-3 rounded-full mr-4 {{ $class }}">
                {{ $slot }}
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                    {{ $caption }}
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $score }}
                </p>
            </div>
        </div>
    </div>
</a>
