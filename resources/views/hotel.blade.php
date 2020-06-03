@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">

<div class="content">
    <div class="title m-b-md">
        Welcome to hotel
    </div>

    <div class="links">
        <a href="https://laravel.com/docs">git</a>
        <a href="{{ url('/') }}">Home</a>
    </div>
</div>
</div>

<script>

$.ajax({
        url: "{{ route('hotel-by-city') }}",
        data: {
            city: "ranchi"
        },
        dataType: "JSON",
        success: function(msg) {
            if (msg.length) {
                console.log(msg)
            }
        }
    });
</script>

@endsection