<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p6'])}}> {{-- $attributes vatiable allow mreging of external class if card is used --}}
    {{-- anything that is enclosed with x-card tag will go here using this slot --}}
    {{$slot}}
</div>