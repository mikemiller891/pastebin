<div class="grid gap-6 mb-8 md:grid-cols-2">

    <x-r-scorecard href="{{ route('users.index') }}" class="text-red-500 bg-red-100" caption="Total users" score="{{ App\Models\User::all()->count() }}">
        <x-heroicon-s-users class="h-6 w-6"/>
    </x-r-scorecard>

    <x-r-scorecard href="{{ route('pastes.index') }}" class="text-green-500 bg-green-100" caption="Total pastes" score="{{ App\Models\Paste::all()->count() }}">
        <x-heroicon-s-document-text class="h-6 w-6"/>
    </x-r-scorecard>

</div>
