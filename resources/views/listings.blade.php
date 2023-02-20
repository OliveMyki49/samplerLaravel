@extends('layout') {{-- will be extended in layout blade php file --}}

@section('content') {{-- Display this in content section of layout blade php file --}}

@include('partials._hero') {{-- Partial folder like component --}}
@include('partials._search') {{-- Partial folder like component --}}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
     <!-- pass the value from route -->
    {{-- <h2><?php //echo $heading ?></h2> --}}

    @unless(count($listings) == 0){{-- Display no data fond if listings array is empty --}}
        

    @foreach($listings as $item)<!-- pass data using foreach -->
            {{-- THIS IS OLD FORMAT --}}
            {{-- 
                <h3>
                    <a href="/listing/{{$item['id']}}"> {{$item['id']}} | {{$item['title']}}</a>
                </h3>
                <p>{{$item['description']}}</p> 
            --}}

            
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
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
                        <ul class="flex">
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                            >
                                <a href="#">Laravel</a>
                            </li>
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                            >
                                <a href="#">API</a>
                            </li>
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                            >
                                <a href="#">Backend</a>
                            </li>
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                            >
                                <a href="#">Vue</a>
                            </li>
                        </ul>
                        <div class="text-lg mt-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
                        </div>
                    </div>
                </div>
            </div>
    @endforeach;

    @else
        <p>No Data Found</p>
    @endunless

</div>
@endsection {{-- end the layout content section here --}}
