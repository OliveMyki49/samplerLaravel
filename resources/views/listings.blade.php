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

            
            {{-- Pass into component --}}
            <x-listing-card :item="$item"></x-listing-card> {{-- name of the tag is the name of the component in the folder component --}}
    @endforeach;

    @else
        <p>No Data Found</p>
    @endunless

</div>
@endsection {{-- end the layout content section here --}}
