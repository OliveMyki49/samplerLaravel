@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show=false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>

    {{-- 
        alpine js added!!!
        x-data — value state is true
        x-time — timer 3 seconds before hiding message div
        x-show — state show
        --}}
@endif