<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="мукополісахаридоз, мукополісахаридоз україна, мукополісахаридоз в україні, мпс, синдром гурлер, синдром хантера, синдром слайя, синдром маротто-ламі, синдром санфіліппо, орфанні захворювання">
    <meta name="description" content="Офіційный сайт Мукополісахаридоз Україна. Об'єднання сімей з дігнозом мукополісахаридоз. інформацыя про типи мукополісахаридозів, лікування, новини, історії сімей та статті">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <title>Мукополісахаридоз Україна</title>
</head>
<body id="app">
    <index></index>
{{--для незарегистрированного пользователя:--}}
{{--<h1>user = null{{json_encode(Auth::user())}}</h1>--}}
{{--<h1>is-guest = true {{ json_encode(auth()->guest()) }}</h1>--}}
{{--    <index :user="{{json_encode(Auth::user())}}" :is-guest="{{ json_encode(auth()->guest()) }}"></index>--}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
</body>
</html>
{{--<script src="{{ asset('assets/js/app.js') }}" defer></script>--}}
