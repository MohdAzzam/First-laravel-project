<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body>
@include('nav')
<div class="flex-center position-ref full-height " id="app">
    <image-up></image-up>
</div>
<div class="container">
    <div class="row">
        @foreach($images as $image)
            <div class="col-2 mb-4 mt-4">
                <a href="{{$image->original}}" target="_blank">
                    <img src="{{$image->thumbnail}}"class="w-100">
                </a>
                @can('delete',$image)
                <form action="/upload-image/{{$image->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="small btn btn-outline-danger mt-2">Delete</button>
                </form>
                @endcan

            </div>
        @endforeach
    </div>
</div>
<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>

