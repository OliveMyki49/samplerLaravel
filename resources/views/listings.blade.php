@extends('layout') {{-- will be extended in layout blade php file --}}

@section('content') {{-- Display this in content section of layout blade php file --}}

<h2><?php echo $heading ?></h2> <!-- pass the value from route -->

@if(count($listings) == 0){{-- Display no data fond if listings array is empty --}}
    <p>No Data Found</p>
@endif

@foreach($listings as $item)<!-- pass data using foreach -->
        <h3>
            <a href="/listings/{{$item['id']}}"> {{$item['id']}} | {{$item['title']}}</a>
        </h3>
        <p>{{$item['description']}}</p>
    </tr>
</table>
@endforeach;

@endsection {{-- end the layout content section here --}}
