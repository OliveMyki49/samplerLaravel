{{-- way to make component define prop first --}}
{{-- @prop(['item']) --}}

<x-card> {{-- this tag is from card blade file component --}}
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset('images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listing/{{ $item->id }}">{{ $item->id }} | {{ $item->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
            
            <x-listing-tags :tagsCsv="$item->tags"></x-listing-tags> {{-- tags component; tagsCsv is a prop --}}

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
            </div>
        </div>
    </div>
</x-card>