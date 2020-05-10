<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Transport Management System') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">


    @include('layouts.header-script')
    @yield('style')

</head>

<body>
<noscript>
    <strong>We're sorry but this dynamic-application doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>

<!-- Preloader -->
{{--<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>--}}
<div id="wrapper"></div>
<!-- /#wrapper -->

@include('layouts.footer-script')

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

@yield('scripts')

</body>

</html>

