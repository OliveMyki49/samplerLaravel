<h1><?php echo $heading ?></h1> <!-- pass the value from route -->

@if(count($listings) == 0){{-- Display no data fond if listings array is empty --}}
    <p>No Data Found</p>
@endif

@foreach($listings as $item)<!-- pass data using foreach -->
        <h2>{{$item['id']}} | {{$item['title']}}</h2>
        <p>{{$item['description']}}</p>
    </tr>
</table>
@endforeach;
