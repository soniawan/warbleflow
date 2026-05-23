<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        @foreach ($warbles as $warble)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $warble['author'] }}</div>
                        <div class="mt-1">{{ $warble['message'] }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $warble['time'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>