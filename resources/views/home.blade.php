<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
    <meta name='csrf-token' content = "{{ csrf_token() }}">
    <title>LaraVue</title>
</head>
<body>
    <div id="app">
        <v-app>
            <app-home></app-home>
        </v-app>
    </div>

    <!-- <script src="{{asset('js/app.js')}}"></script> -->
    <script src="{{secure_asset('js/app.js')}}"></script>
</body>
</html>