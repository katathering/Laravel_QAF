<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 8 CRUD Application - ItSolutionStuff.com</title>
{{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
--}}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{--<script src="{{asset('js/answers.js')}}" ></script>--}}


<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .is-invalid {
            border-color: #e3342f;
            padding-right: calc(1.6em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e3342f' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e3342f' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.4em + 0.1875rem) center;
            background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }
        body {
            background-color: #ffffff !important;
        }

        nav{
            background-color: #e6e6e6 !important;
        }

        h1{
            font-size: 35px;
            margin: 2rem 0 2rem 0;
        }

        #image{
            border:none;
        }

        #info{
            margin-top: 1rem;
        }

        #back .btn {
            border: .0625rem solid #2c2c2c;
        }

        .not-logged-in{
            background-color: #e6e6e6;
            text-align: right;
            height: 3rem;
            padding-top: 0.6rem;
            padding-right: 18%;
        }

        /*.filter-table tr{
            padding: 10px;
        }*/

        td{
            padding: 15px 0 15px 0;
        }

        td a:hover{
            text-decoration: none;
        }

        table{
            width: 100%;
        }

        .a-div{
            width: 100%;
            background-color: #e6e6e6;
            padding: 0.6rem;
        }

        #search{
            margin-bottom: 1.5rem;
            border: 1px solid #494949;
            width: 50%;
            padding: 0.5rem;
            outline: black;
        }

    </style>
    @yield('head')
</head>
<body>
@yield('header')
<div class="container">
    @yield('content')
</div>

@yield('script')

</body>
</html>
