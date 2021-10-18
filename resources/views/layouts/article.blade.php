<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('first_theme/js/contact.js')}}"></script>
    <title>test</title>

</head>
<body>
    <main class="m-4">

        @if(session()->has('notice'))
            <div class="bg-pink-300 px-3 py-2 rounded">
                {{session()->get('notice')}}
            </div>
        @endif
        @yield('main')
    </main>


</body>
<script src="{{asset('js/app.js')}}" ></script>
</html>