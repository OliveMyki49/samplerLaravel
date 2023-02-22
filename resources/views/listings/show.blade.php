{{-- @extends('layout') will be extended in layout blade php file --}}
{{-- @section('content') Display this in content section of layout blade php file --}}

<x-layout> {{-- This is the layout component --}}

    {{-- @include('partials._search') Partial folder like component --}}

    {{-- 
        <h3>
            <a href="/listings/{{$item['id']}}"> {{$item['id']}} | {{$item['title']}}</a>
        </h3>
        <p>{{$item['description']}}</p> 
    --}}

    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10"> {{-- pass class p-24 padding in card component --}}
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    {{-- to check if there is an image logo in the database use the src="" code below --}}
                    src="{{$item->logo ? asset('storage/'. $item->logo) :  asset('images/no-image.png')}}" 
                    alt=""
                />

                <h3 class="text-2xl mb-2"> {{$item->id}} | {{$item->title}}</h3>
                <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
                
                <x-listing-tags :tagsCsv="$item->tags"></x-listing-tags> {{-- tags component; tagsCsv is a prop --}}

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{$item->description}}
                        </p>

                        <a
                            href="mailto:{{ $item->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="{{ $item->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listing/{{ $item->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            
            <form action="/listing/{{$item->id}}/delete" method="POST">
                @csrf {{-- Prevents cross platform injection --}}
                @method('DELETE') {{-- method POST DELETE --}}
                <button class="text-red-500 ">
                    <i class="fa-solid fa-trash"></i> DELETE
                </button>
            </form>
        </x-card>

    </div>

</x-layout> {{-- end of layout component --}}

{{-- @endsection end the layout content section here --}}